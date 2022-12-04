<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\AdminLog;
use Illuminate\Http\Request;
use App\Models\AdminResidents;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\ResidentsRegistration;
use App\Http\Controllers\Helper\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog as ModelsActivityLog;

class UserController extends Controller
{

    public function register(){
        return view('/register');
    }

     //View User Profile
     public function myProfile(){
        $profile = Auth::user()->adminResidents;
        // dd($profile);
        return view('user.Profile',['profile'=>$profile]);
    }

     //View Form User Profile
     public function editProfile(){
        $profile = Auth::user()->adminResidents;
        // dd($profile);
        return view('user.editProfile',['profile'=>$profile]);
    }


    //Profile Update
    public function updateProfile(Request $request ){

        $this->validate($request,[
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
            'phone_number' => ['required','numeric','digits:11'],
            'occupation' =>'required',
            'work_status' =>'required',
            'resident_image' =>'image'

        ]);
        $pass = bcrypt($request->password);

        if($request->hasFile('resident_image')){
            $image= $request->file('resident_image')->store('images', 'public');
        }
        else{
            $image = $request->old_resident_image;
        }

        $user=auth()->user();

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
            'password'=>$request->password

        ]);

        return redirect('/myProfile')->with('message', 'Profile Updated Sucessfully');
}



     //Register Admin Residents Storing Data
     public function registerStore(Request $request){

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
            'resident_image' =>['required','image'],
            'id_image' =>['required','image'],
            'password' =>'required',
            'userType' =>'required',
            'status' =>'required',


        ]);
        $pass = bcrypt($request->password);

        // if($request->hasFile('profile_image','&&', 'image_id-birth')){
        //     $formFields['profile_image'] = $request->file('profile_image')->store('images', 'public');
        //     $formFields['image_id_birth'] = $request->file('image_id_birth')->store('images', 'public');
        // }
        if($request->hasFile('resident_image')){
            $image1= $request->file('resident_image')->store('images', 'public');
        }
        if($request->hasFile('id_image')){
            $image2= $request->file('id_image')->store('images', 'public');
        }

        $user = new User();
        $user->email =$request -> email;
        $user->password = $pass;
        $user->userType =$request ->  userType;
        $user ->save();

        ActivityLog::log(
            'created residents registration with id ' . $user->id . ' ' . $user->first_name,
            'residents_registrations',
            $user->id,
          );

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
            'resident_image' => $image1,
            'id_image' => $image2,
            'status' => $request->status,
        ]);

        return back()->with('message', 'Registration Complete');

}

//Residents registration
public function registration(){

    $reg = AdminResidents::where('status', '=', '0')->paginate(4);
    return view('Admin.Registration.registration',['reg'=>$reg]);

}

 //View Residents
 public function viewRegistration($id){

    $reg = AdminResidents::find($id);

    return view('Admin.Registration.viewRegistration', ['reg'=>$reg]);

}

public function acceptRegistration(Request $request, $id){

    $residents=AdminResidents::find($id);
    $status = 1;

    AdminResidents::where('id', $id)->update(['status' => $status]);

    ActivityLog::log(
        'accepted the registration of '. $residents->first_name .' '. $residents->last_name,
        'admin_residents',
        $residents->id,
      );

    return redirect('/residents')->with('message', 'Residents Registration Accepted');
}

public function activityLog(Request $request)
{
  $request->validate([
    'search' => 'nullable|string',
    'perPage' => 'nullable|integer',
    'page' => 'nullable|integer',
    'sortBy' => 'nullable|string',
  ]);

  $perPage = $request->perPage ?? 10;
  $sort = explode(' ',  $request->sortBy ?? 'created_at desc');
  $column = $sort[0];
  $direction = $sort[1];

  $logs = ModelsActivityLog::when($request->search, function ($query, $search) {
    return $query->where('action', 'like', '%' . $search . '%');
  })
    ->orderBy($column, $direction)
    ->paginate($perPage);
  return view('admin.activitylog', ['logs' => $logs]);
}

public function manageAdmin(){
    $ad = Admin::all()->where('userType','=','0');
    return view('Admin.Manage_Admin.manageAdmin', ['ad'=>$ad]);

}

 //Add Admins Storing Data
 public function addAdmin(Request $request){

    $this->validate($request,[
        'first_name' =>'required',
        'last_name' =>'required',
        'position' =>'required',
        'email' =>'required',
        'password' =>'required',
        'userType' =>'required',
        'admin_image' =>'required',
    ]);

    $pass = bcrypt($request->password);

    if($request->hasFile('admin_image')){
        $image = $request->file('admin_image')->store('images', 'public');
    }

    $user = new User();
    $user->email = $request->email;
    $user->password = $pass;
    $user->userType = $request->userType;
    $user->type = $request->position;
    $user->save();

    $user->admin()->update([
        'first_name' => $request->first_name,
        'last_name' => $request->first_name,
        'position' => $request->position,
        'admin_image' => $image,
       
    ]);

    // $admin->admin()->create($formFields);

    return back()->with('message', 'Admin Created Successfuly');


}


public function adminLogs(){
    return view('Admin.Manage_Admin.admin_logs', [
        'log' => AdminLog::get()
    ]);
}


public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
}

 //Login Page
 public function login(){

 return view('loginPage');
}

//Login
public function userLogin(Request $request){
    $user = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);
    if(auth()->attempt($user)) {
        $request->session()->regenerate();
    {
        if(auth()->user()->userType =='0')
        {
         return redirect('/dashboard')->with('message', 'You are now Logged In!');
        }
        else if(auth()->user()->userType =='1' && auth()->user()->adminResidents->status=='1')
        {
         return redirect('/home')->with('message', 'You are now Logged In!');
        }
    }
}
return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
}


}
