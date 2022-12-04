<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\ActivityLog;
use App\Models\RequestCertificate;
use App\Models\Blotter;
use App\Models\AdminResidents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
  public function request(){
    return view('user.request');
  }

  public function residentBlotter(){
    return view('user.residentBlotter');
  }


  public function viewPayment($id)
  {

    $req = RequestCertificate::find($id);
    return view('admin.certificate', ['req' => $req]);
  }


  // public function editResidents(AdminResidents $resident){
  //     return view('Admin.certificate', ['resident' => $resident]);

  // }

  //Request Storing Data
  public function addrequest(Request $request)
  {

    $formFields = $request->validate([
      'first_name' => 'required',
      'middle_name' => 'nullable',
      'last_name' => 'required',
      'docType' => 'required',
      'paymentMethod' => 'required',
      'screenshot' => 'nullable|image|mimes:jpeg,png,jpg|max:512000',
      'referenceNumber' => 'sometimes|required_if:paymentMethod,==,GCash',
      'purpose' => 'required',
      'otherPurpose' => 'sometimes|required_if:purpose,==,Others please specify',
    ]);

    // check first name and last name if exist on AdminResidents table
    $check = AdminResidents::where('first_name', $formFields['first_name'])
      ->where('last_name', $formFields['last_name'])
      ->when($formFields['middle_name'], function ($query) use ($formFields) {
        return $query->where('middle_name', $formFields['middle_name']);
      })
      ->first();

    if (!$check) {
      return redirect()->back()->with('message-negative', 'No resident found with the name ' . $formFields['first_name'] . ' ' . $formFields['last_name']);
    }


    if ($request->hasFile('screenshot')) {
      // rename file
      $fileName = $request->screenshot->getClientOriginalName();
      // rename the file
      $fileName = md5(uniqid()) . '_' . $fileName;

      $request->screenshot->move(public_path('screenshot'), $fileName);
      //get path
    }
    $certificate = RequestCertificate::create([
      'fullname' => $formFields['first_name'] . ' ' . $formFields['middle_name'] . ' ' . $formFields['last_name'],
      'docType' => $request->docType,
      'paymentMethod' => $request->paymentMethod,
      'referenceNumber' => $request->referenceNumber,
      'purpose' => $request->purpose,
      'otherPurpose' => $request->otherPurpose,
      'screenshot' => $fileName ?? null,
      'admin_resident_id' => $check->id,
    ]);

    return back()->with('message-positive', 'Request Certificate Successful');
  }

  //Delete Residents


  //Request Storing Data
  public function requestBlotter(Request $request)
  {
    $formFields = $request->validate([
      'complainant'   => 'required',
      'respondent'    => 'required',
      'victim'        => 'required',
      'location'      => 'required',
      'date'          => 'required',
      'time'          => 'required',
      'details'       => 'required',
      'proof'         => 'nullable|image|mimes:jpeg,png,jpg|max:5120000',
    ]);
    if ($request->hasFile('proof')) {
        $formFields['proof'] = $request->file('proof')->store('images', 'public');
      }
    $blotter = Blotter::create($formFields);

    ActivityLog::log(
      'created blotter with id ' . $blotter->id . ' complainant ' . $blotter->complainant,
      'blotters',
      $blotter->id,
    );

    return back()->with('message-positive', 'Successfully Reported');
  }

}
