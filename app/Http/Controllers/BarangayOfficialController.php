<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\barangayOfficial;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BarangayOfficialController;

class BarangayOfficialController extends Controller
{
    public function listBrgyOfficial(){
        $official = barangayOfficial::all();
        return view('Admin.Barangay_Official.listBarangayOfficial', ['official'=>$official]);

}
   //Form Barangay Official
    public function official(){
    return view('Admin.Barangay_Official.formAddOfficial');

}

       //Barangay Official Storing Data
       public function storeOfficial(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'name' =>'required',
            'age' =>['required','numeric'],
            'birthdate' =>'required',
            'gender' =>'required',
            'position' =>'required',
            'phone_number' => ['required','numeric'],
            'email' =>'',
            'official_image' => 'required',
            'status'=>'',
            'usertype'=>'',
            'username'=>'required',
            'password' =>['required','confirmed'],
           
        ]);
        
    $pass = bcrypt($request->password);

    if($request->hasFile('official_image')){
        $image = $request->file('official_image')->store('images', 'public');
    }
            $user = new User();
            $user->username = $request->username;
            $user->password = $pass;
            $user->userType = $request->userType;
            $user->status = $request->status;
            $user->save();
    
            $user->admin()->update([
            'name' => $request->name,
            'age' => $request->age,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'position' => $request->position,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'official_image' => $image,
        ]);

    return redirect('/listBrgyOfficial')->with('message', 'Barangay Officials Profile Created Successfully'); 

}

 //Delete Residents
 public function deleteOfficial($id)
 {
     $official=barangayOfficial::find($id);

     $official->delete();

     return back()->with('message', 'Barangay Official Profile Deleted');

 }


 //Update Barangay Officialss
 public function updateOfficial(Request $request, barangayOfficial $official){
    // dd($request->all());
    $formFields = $request->validate([
        'name' =>'required',
        'age' =>'required',
        'birthdate' =>'required',
        'gender' =>'required',
        'position' =>'required',
        'phone_number' => 'required',
        'email' =>'',
        'official_image' => '',
        'status'=>'',
        'usertype'=>'',
        'username'=>'',
        'password'=>'',
    ]);

    $pass = bcrypt($request->password);
    if($request->hasFile('official_image')){
        $formFields['official_image'] = $request->file('official_image')->store('images', 'public');
    }

    $official->update($formFields);
    
    return back()->with('message', 'Barangay Officials Profile Created Successfully');

}


 //Login Page
 public function login(){

    return view('adminLoginPage');

}



}
