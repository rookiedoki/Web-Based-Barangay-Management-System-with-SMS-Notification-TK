<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Helper\ActivityLog;
use App\Models\User;
use App\Models\Archive;
use App\Models\ActivityLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminResidents;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminResidentsController extends Controller
{


      //Show Admin Residents Form
    public function residents(){
        $resident = AdminResidents::where('status', '=', '1')->paginate(4);
        return view('Admin.Residents.residents',['resident'=>$resident]);
    }
    //View Residents
    public function viewResidents($id){
        $resident = AdminResidents::find($id);
        return view('Admin.Residents.viewResidents', ['resident'=>$resident]);
    }
    //Search Residents
    public function search_residents(Request $request){
        return view('Admin.Residents.residents', [
            'resident' => AdminResidents::where('status', '=', '1')->latest()->filter(request(['search']))->paginate(4)
        ]);
    }
       //Admin Adding Residents Storing Data
       public function adminStore(Request $request){
        $this->validate($request,[
            'first_name' =>'required',
            'middle_name' =>'required',
            'last_name' =>'required',
            'nickname' =>'required',
            'place_of_birth' =>'required',
            'birthdate' => 'required',
            'age' =>['required','numeric','min:1', 'max:120'],
            'civil_status' => 'required',
            'street' => 'required',
            'house_no' => ['required','numeric'],
            'gender' => 'required',
            'voter_status' => 'required',
            'citizenship' => 'required',
            'email' => ['required', 'email', Rule::unique('users','email')],
            'phone_number' => ['required','numeric','digits:11'],
            'occupation' =>'required',
            'work_status' =>'required',
            'password' =>'required',
            'status' =>'required',
            'resident_image' =>['required','image'],

        ]);
        $pass = bcrypt($request->password);

        if($request->hasFile('resident_image')){
            $image= $request->file('resident_image')->store('images', 'public');
        }

        $user = new User();
        $user->email =$request -> email;
        $user->password = $pass;
        $user->userType =$request ->  userType;
        $user ->save();

        $user->adminResidents()->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'nickname' => $request->nickname,
            'place_of_birth' => $request->place_of_birth,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'civil_status' => $request->civil_status,
            'street' => $request->street,
            'house_no' => $request->house_no,
            'gender' => $request->gender,
            'voter_status' => $request->voter_status,
            'citizenship' => $request->citizenship,
            'phone_number' => $request->phone_number,
            'occupation' => $request->occupation,
            'work_status' => $request->work_status,
            'resident_image' => $image,
            'status' => $request->status,
        ]);

        $adminResidents = AdminResidents::create($pass);

        ActivityLog::log(
          ' added resident ' .
            $adminResidents->first_name .
            ' ' . $adminResidents->last_name,
          'admin_residents',
          $adminResidents->id
        );

        return redirect('/residents')->with('message', 'Residents Profile Created Successfuly');
}

    //Delete Residents
    public function deleteResidents(Request $request, $id)
    {
        $residents=AdminResidents::find($id);
        $status = 3;

        AdminResidents::where('id', $id)->update(['status' => $status]);

        ActivityLog::log(
            ' deleted resident ' .
              $residents->first_name .
              ' ' . $residents->last_name,
            'admin_residents',
            $residents->id
          );

      return back()->with('message', 'Resident Record Deleted');

    }


    //Show Archive
    public function archive(){
        $resident = AdminResidents::where('status', '=', '3')->paginate(4);
        return view('Admin.Residents.archive', ['resident'=>$resident]);
    }

      //Restoree Residents
      public function restore(Request $request, $id)
      {
          $residents=AdminResidents::find($id);
          $status = 1;

          AdminResidents::where('id', $id)->update(['status' => $status]);
        return back()->with('message', 'Resident Record Restored');

      }




    //Show Edit Residents Form
    public function editResidents(AdminResidents $residents){


        return view('Admin.Residents.residents', ['residents' => $residents]);

    }


    //Update Residents Admin Form
    public function updateResidents(Request $request, AdminResidents $residents){

        $formFields = $request->validate([
            'first_name' =>'required',
            'middle_name' =>'required',
            'last_name' =>'required',
            'nickname' =>'required',
            'place_of_birth' =>'required',
            'birthdate' => 'required',
            'age' =>['required','numeric'],
            'civil_status' => 'required',
            'street' => 'required',
            'house_no' => 'required',
            'gender' => 'required',
            'voter_status' => 'required',
            'citizenship' => 'required',
            'email' => ['required', 'email'],
            'phone_number' => ['required','numeric', 'min:11|max:13'],
            'occupation' =>'required',
            'work_status' =>'required',
            'resident_image' =>'image'
        ]);



        if($request->hasFile('resident_image')){
            $formFields['resident_image'] = $request->file('resident_image')->store('images', 'public');
        }

        $residents->update($formFields);

        ActivityLog::log(
          'updated resident ' .
            $residents->first_name .
            ' ' . $residents->last_name,
          'admin_residents',
          $residents->id
        );
        return back()->with('message', 'Update Successful');

    }


}


