<?php

namespace App\Http\Controllers;

use App\Models\settings;
use App\Models\FreqAsked;
use Illuminate\Http\Request;
use App\Models\FreqAskedTitle;
use App\Http\Controllers\SettingsController;

class SettingsController extends Controller
{

//Settings
public function settings(){
    $setting = settings::all();
    return view('admin.settings', ['setting'=>$setting]);
}


//Update Settings
public function updateSettings(Request $request, settings $setting){
    // dd($request->all());
    $formFields = $request->validate([
        'barangay_name'=>'required',
        'brgy_location'=>'required',
        'brgy_email'=>'required',
        'description'=>'required',
        'vission'=>'required',
        'mission'=>'required',
        'goal'=>'required',
        'system_title'=>'required',
        'about_section1'=>'required',
        'about_section2'=>'required',
    ]);

    if($request->hasFile('system_logo')){
        $formFields['system_logo'] = $request->file('system_logo')->store('images', 'public');

    }
    else{
        $formFields['system_logo'] = $request->old_system_logo;
    }

    if($request->hasFile('barangay_logo')){

        $formFields['barangay_logo'] = $request->file('barangay_logo')->store('images', 'public');
    }
    else{

        $formFields['barangay_logo'] = $request->old_brgy_logo;
    }

    if($request->hasFile('barangay_logo2')){

        $formFields['barangay_logo2'] = $request->file('barangay_logo2')->store('images', 'public');
    }
    else{

        $formFields['barangay_logo2'] = $request->old_brgy_logo2;
    }

// dd($formFields);
    $setting->update($formFields);
    return back()->with('message', 'Update Successful');

}


public function freq_asked(){
    
    $freq_asked = FreqAsked::all();

    return view('admin.freq_asked',['freq_asked'=>$freq_asked]);
}

// Edit Frequently Aked
public function edit_freq_asked_title(){
    
    $freq_asked_title = FreqAskedTitle::all();
    $freq_asked = FreqAsked::all();
    return view('admin.freq_asked',['freq_asked_title'=>$freq_asked_title,'freq_asked'=>$freq_asked]);
}

  //Frequently Asked Storing Data
  public function store_freq_asked(Request $request){
        // dd($request->all());
    $formFields = $request->validate([
        'question' =>'required',
        'answer' =>'required',    
    ]);

    $freq_asked = FreqAsked::create($formFields);
    return back()->with('message', 'Frequently Asked Created Successfuly');
}

    //Update Frequently Asked 
    public function update_freq_asked(Request $request, FreqAsked $id){
    // dd($request->all);
        $formFields = $request->validate([
            'question' =>'required',
            'answer' =>'required',
        ]);
        $id->update($formFields);
        return back()->with('message', 'Frequently Asked Updated Successfuly');
}

    //Update Frequently Asked Title
    public function update_freq_asked_title(Request $request, FreqAskedTitle $id){
        // dd($request->all);
            $formFields = $request->validate([
                'frq_asked_title' =>'required',

            ]);
            $id->update($formFields);
            return back()->with('message', 'Frequently Asked Title Updated Successfuly');
    }

//Delete Frequently Asked
public function delete_freq_asked($id)
{
    $freq_asked=FreqAsked::find($id);

    $freq_asked->delete();

    return back()->with('message', 'Frequently Asked Deleted');

}


}
