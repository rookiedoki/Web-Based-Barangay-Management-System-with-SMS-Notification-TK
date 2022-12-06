<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\barangayOfficial;
use Illuminate\Support\Facades\Hash;
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

        $formFields = $request->validate([
            'name' =>'required',
            'age' =>['required','numeric'],
            'birthdate' =>'required',
            'gender' =>'required',
            'position' =>'required',
            'phone_number' => ['required','numeric'],
            'email' =>'required',
            'official_image' => 'required',

        ]);

        if($request->hasFile('official_image')){
            $formFields['official_image'] = $request->file('official_image')->store('images', 'public');
        }
        $official = barangayOfficial::create($formFields);
        return redirect('/listBrgyOfficial')->with('message', 'Barangay Official Created Successfuly');

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

    $formFields = $request->validate([
        'name' =>'required',
        'age' =>['required','numeric'],
        'birthdate' =>'required',
        'gender' =>'required',
        'position' =>'required',
        'phone_number' => ['required','numeric'],
        'email' =>['required', Rule::unique('users','email')]

    ]);
    if($request->hasFile('official_image')){
        $formFields['official_image'] = $request->file('official_image')->store('images', 'public');
    }
    $official->update($formFields);

    return back()->with('message', 'Update Successful');

}

 //Login Page
 public function login(){

    return view('adminLoginPage');

}



}
