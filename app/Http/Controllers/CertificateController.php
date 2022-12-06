<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\ActivityLog;
use App\Models\AdminResidents;
use App\Models\barangayOfficial;
use App\Models\Certificate;
use App\Models\RequestCertificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

  public function barangayClearance($id)
  {
    $certificate = RequestCertificate::find($id);
    if ($certificate->status == 'pending') {
      $certificate->status = 'approved';
      $certificate->save();
      ActivityLog::log(
        'approved barangay' . $certificate->doctype  . ' with id ' . $certificate->id . ' ' . $certificate->fullname,
        'certificate',
        $certificate->id,
      );
    } else if ($certificate->status == 'declined') {
      return redirect()->back()->with('success', 'Request is already declined');
    }
    $cer =  $certificate->admin_resident;
    $resident = AdminResidents::find($id);
    $barangay_head = barangayOfficial::where('position','Barangay Captain')->first();
    $barangay_secretary = barangayOfficial::where('position','Barangay Secretary')->first();
    return view('admin.requestsCertificates.barangayClearance', ['cer' => $cer,'barangay_secretary'=>$barangay_secretary,'barangay_head'=>$barangay_head]);


  }

  public function barangayResidency($id)
  {
    $certificate = RequestCertificate::find($id);
    if ($certificate->status == 'pending') {
      $certificate->status = 'approved';
      $certificate->save();

      ActivityLog::log(
        'approved barangay' . $certificate->doctype  . ' with id ' . $certificate->id . ' ' . $certificate->fullname,
        'certificate',
        $certificate->id,
      );
    } else if ($certificate->status == 'declined') {
      return redirect()->back()->with('success', 'Request is already declined');
    }
    $cer =  $certificate->admin_resident;
    $barangay_head = barangayOfficial::where('position','Barangay Captain')->first();
    $barangay_secretary = barangayOfficial::where('position','Barangay Secretary')->first();
    return view('admin.requestsCertificates.barangayResidency', ['cer' => $cer,'barangay_secretary'=>$barangay_secretary,'barangay_head'=>$barangay_head]);
  }

  public function certificateOfResidency(Request $request)
  {
    $request->validate([
      'search' => 'nullable|string|max:255',
    ]);
    $request->validate([
      'search' => 'nullable|string|max:255',
      'status' => 'nullable|string|in:pending,approved,declined',
    ]);

    $status = $request->status ?? 'pending';
    // $res = RequestCertificate::paginate(5);
    $res = RequestCertificate::where('doctype', '=', 'Certificate of Residency')
      ->where('status', '=', $status)
      ->when($request->search, function ($query) use ($request) {
        return $query->where('fullname', 'like', '%' . $request->search . '%');
      })->get();
    return view('admin.requestsCertificates.certificateOfResidency', ['res' => $res]);
  }

  public function certificateOfIndigency(Request $request)
  {
    $request->validate([
      'search' => 'nullable|string|max:255',
      'status' => 'nullable|string|in:pending,approved,declined',
    ]);

    $status = $request->status ?? 'pending';
    $ind = RequestCertificate::where('doctype', '=', 'Certificate of Indigency')
      ->where('status', '=', $status)
      ->when($request->search, function ($query) use ($request) {
        return $query->where('fullname', 'like', '%' . $request->search . '%');
      })->get();
    return view('admin.requestsCertificates.certificateOfIndigency', ['ind' => $ind]);
  }

  public function certificateOfClearance(Request $request)
  {
    $request->validate([
      'search' => 'nullable|string|max:255',
      'status' => 'nullable|string|in:pending,approved,declined',
    ]);

    $status = $request->status ?? 'pending';

    $clear = RequestCertificate::where('doctype', '=', 'Barangay Clearance')
      ->where('status', $status)
      ->when($request->search, function ($query) use ($request) {
        return $query->where('fullname', 'like', '%' . $request->search . '%');
      })->orderBy('id','ASC')->get();


      return view('admin.requestsCertificates.certificateOfClearance', ['clear' => $clear]);

  }


  public function barangayIndigency($id)
  {
    // $cer = AdminResidents::find($id);
    // return view('admin.barangayIndigency', ['cer' => $cer]);

    $certificate = RequestCertificate::find($id);
    if ($certificate->status == 'pending') {
      $certificate->status = 'approved';
      $certificate->save();

      ActivityLog::log(
        'approved barangay' . $certificate->doctype  . ' with id ' . $certificate->id . ' ' . $certificate->fullname,
        'certificate',
        $certificate->id,
      );
    } else if ($certificate->status == 'declined') {
      return redirect()->back()->with('success', 'Request is already declined');
    }
    $cer =  $certificate->admin_resident;
    $barangay_head = barangayOfficial::where('position','Barangay Captain')->first();
    $barangay_secretary = barangayOfficial::where('position','Barangay Secretary')->first();
    return view('admin.requestsCertificates.barangayIndigency', ['cer' => $cer,'barangay_head'=>$barangay_head,'barangay_secretary'=>$barangay_secretary]);
  }
  public function deleteRequest($id)
  {
    $cer = RequestCertificate::find($id);
    $cer->delete();

    ActivityLog::log(
      'deleted request ' . $cer->doctype . ' with id ' . $cer->id . ' ' . $cer->fullname,
      'certificate',
      $cer->id,
    );

    return back()->with('message', 'Request Deleted');
  }
  // public function barangayResidency($id){
  //     $cer = AdminResidents::find($id);
  //     return view('admin.barangayIndigency',['cer'=>$cer]);
  //     }
  public function certificateStore(Request $request, Certificate $certificate)
  {

    $formFields = $request->validate([
      'first_name' => 'required',
      'middle_name' => 'required',
      'last_name' => 'required',
      'nickname' => 'required',
      'place_of_birth' => 'required',
      'birthdate' => 'required',
      'age' => 'required|before:13 years ago',
      'civil_status' => 'required',
      'street' => 'required',
      'gender' => 'required',
      'voter_status' => 'required',
      'citizenship' => 'required',
      'email' => ['required', 'email'],
      'phone_number' =>  'required',
      'occupation' => 'required',
      'password' => 'required'
    ]);

    if ($request->hasFile('resident_image')) {
      $formFields['resident_image'] = $request->file('resident_image')->store('images', 'public');
    }
    $certificate->update($formFields);
    return back()->with('message', 'Update Successful');
  }

  // PANG DECLINED NG CERTIFICATE
  public function declineCertificate($id)
  {
    $certificate = RequestCertificate::find($id);
    if ($certificate->status == 'pending') {
      $certificate->status = 'declined';
      $certificate->save();

      ActivityLog::log(
        'declined ' . $certificate->doctype . ' with id ' . $certificate->id . ' ' . $certificate->fullname,
        'certificate',
        $certificate->id,
      );
    }
    return back()->with('message', 'Request Declined');
  }
}
