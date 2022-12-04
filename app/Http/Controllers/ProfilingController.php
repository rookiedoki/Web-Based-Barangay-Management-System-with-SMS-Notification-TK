<?php

namespace App\Http\Controllers;
use App\Models\PWD;
use App\Models\Vaccine;
use App\Models\Pregnant;
use Illuminate\Http\Request;
use App\Models\SeniorCitizen;
use App\Models\AdminResidents;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ProfilingController extends Controller
{

   //User Profiling 
   public function userProfiling(){
    return view('user.Profiling.userProfiling');
}

      //Voters Profiling 
      public function votersProfiling(){

        $voter = AdminResidents::all()->where('voter_status','=','Voter')
        ->where('status', '=', '1' );
        return view('admin.Profiling.Voters.votersProfiling',['voter'=>$voter]);
    }

    // Non Voters Profiling 
    public function nonvotersProfiling(){

      $nonvoter = AdminResidents::all()->where('voter_status','=','Non Voter')
      ->where('status', '=', '1' );
      return view('Admin.Profiling.Voters.nonvotersProfiling',['nonvoter'=>$nonvoter]);
  }

      //Admin Voters Profiling 
      public function workStatusProfiling(){
        $stat = AdminResidents::all()->where('status', '=', '1' );
        return view('Admin.Profiling.Work_Status.workStatusProfiling',['stat'=>$stat]);
    }
    
    //Employed Profiling 
    public function employedProfiling(){
      $emp = AdminResidents::all()->where('work_status','=','Employed')
      ->where('status', '=', '1' );
      return view('Admin.Profiling.Work_Status.employed',['emp'=>$emp]);
  }

   //Unemployed Profiling 
   public function unemployedProfiling(){
    $unemp = AdminResidents::all()->where('work_status','=','Unemployed')
    ->where('status', '=', '1' );
    return view('Admin.Profiling.Work_Status.unemployed',['unemp'=>$unemp]);
}

 //Employed Profiling 
 public function selfemployedProfiling(){
  $selfemp = AdminResidents::all()->where('work_status','=','Employed')
  ->where('status', '=', '1' );
  return view('Admin.Profiling.Work_Status.selfemployed',['selfemp'=>$selfemp]);
}

   //Age Profiling 
   public function ageProfiling(){
    $age = AdminResidents::all()->where('status', '=', '1' );
    return view('Admin.Profiling.age.ageProfiling',['age'=>$age]);

}

//Search Age
public function searchAge(Request $request){
  $from=$request->input('from');
  $to=$request->input('to');

  $findage = DB::table('admin_residents')->select()
  ->where('status', '=', '1' )
  ->where('age', '>=',  $from)
  ->where('age', '<=',  $to)
  ->get();
  // dd($findage);
  return view('Admin.Profiling.age.ageSearchProfiling',['findage'=>$findage, 'from'=>$from, 'to'=>$to]);
}

 //Household Profiling 
 public function household(){
  $house_no = DB::table('admin_residents')->select()
  ->where('status', '=', '1' )
  ->where('house_no', '=', '1')
  ->get();
  return view('Admin.Profiling.Household.household',['house_no'=>$house_no]);
}
  
//Search Household
public function searchHousehold(Request $request){
  $searchouse=$request->input('searchHouse');

  $house_no = DB::table('admin_residents')->select()
  ->where('status', '=', '1' )
  ->where('house_no', '=', $searchouse)
  ->get();
  // dd($house_no);

  return view('Admin.Profiling.Household.searchHousehold',['house_no'=>$house_no,'searchHouse'=> $searchouse]);
}


        //Export PDF HouseHold
        public function exportPDF(){
          $stat = AdminResidents::all();
      
          $pdf = PDF::loadView('test');
          return $pdf->download('householdresidents.pdf');
      
          }

    //User Vaccination Form and Storing Data
 public function storeVaccination(Request $request){
  // dd($request->all());  
 $request->validate([
  'name' =>'required',
  'age' =>'required',
  'birthdate' =>'required',
  'vaccine_type' =>'required',
  'address' =>'required',
  'dose' =>'required',
  'date_first' =>'required', 
  'vaccine_image' => 'required', 
  'date_second' =>'', 
  'booster_date' =>'', 
  'vaccine_image' => 'required', 
  'status' => 'required',
  ]);   

    
  if($request->hasFile('vaccine_image')){
    $image1= $request->file('vaccine_image')->store('images', 'public');
  }

      $vaccinated = new Vaccine;
      $vaccinated->name=$request->name;
      $vaccinated->age=$request->age;
      $vaccinated->birthdate=$request->birthdate;
      $vaccinated->vaccine_type=$request->vaccine_type;
      $vaccinated->address=$request->address;
      $vaccinated->dose=$request->dose;
      $vaccinated->date_first=$request->date_first;
      $vaccinated->date_second=$request->date_second;
      $vaccinated->booster_date=$request->booster_date;
      $vaccinated->status=$request->status;
      $vaccinated->vaccine_image=$image1;
      // dd($vaccinated);
      $vaccinated->save();

  return back()->with('message', 'Profiling Complete');
}
      
  //Admin List of Residence Vaccinted
   public function listVaccinated(){
    $vacc = Vaccine::all()->where('status', '=', '1');
    return view('Admin.Profiling.Vaccination.listVaccinated',['vacc'=>$vacc]);
}

//List of Profiling Vaccination
public function vaccProfiling(){
  $vacc = Vaccine::all()->where('status', '=', '0');
  return view('Admin.Profiling.Vaccination.vaccinatioProfiling',['vacc'=>$vacc]);
}


//View Residence Vaccination Profiling
public function viewVaccProfiling($id){
  $vaccProfiling = Vaccine::find($id);
  return view('Admin.Profiling.Vaccination.viewVaccProfiling', ['vaccProfiling'=>$vaccProfiling]);
}

public function addListVaccinated(Request $request, $id){
  $vaccProfiling = Vaccine::find($id);
  $status = 1;
  Vaccine::where('id', $id)->update(['status' => $status]);
  return redirect('/listVaccinated')->with('message', 'Add to List Completed');
}

 //Admin List of Senior Citizen
 public function listSenior(){
  $sen = SeniorCitizen::all()->where('status', '=', '1');
  return view('Admin.Profiling.SeniorCitizen.listSenior',['sen'=>$sen]);
}

 //User Senior Citizen Form and Storing Data
 public function storeSenior(Request $request){
        
  $formFields = $request->validate([
      'name' =>'required',
      'birthdate' =>'required',
      'age' =>'required',
      'gender' =>'required',
      'status' =>'required',
      'osca_no' =>'required',
      'date_issue' =>'required', 
      'senior_id' => 'required' 
  ]);

if($request->hasFile('senior_id')){
$formFields['senior_id'] = $request->file('senior_id')->store('images', 'public');
}   

// dd($formFields);
$senior = SeniorCitizen::create($formFields);

return back()->with('message', 'Profiling Complete');
}

//List of Senior Citizen Profiling
public function seniorProfiling(){
  $sen = SeniorCitizen::all()->where('status', '=', '0');
  return view('Admin.Profiling.SeniorCitizen.seniorProfiling',['sen'=>$sen]);
}

//View Senior Citizen Profiling
public function viewSeniorProfiling($id){
  $senProfiling = SeniorCitizen::find($id);
  return view('Admin.Profiling.SeniorCitizen.viewSeniorProfiling', ['senProfiling'=>$senProfiling]);
}

//Add to List Senior
public function addListSenior(Request $request, $id){
  $senProfiling = SeniorCitizen::find($id);
  $status = 1;
  SeniorCitizen::where('id', $id)->update(['status' => $status]);
  return redirect('/listSenior')->with('message', 'Add to List Completed');
}

 //User PWD Form and Storing Data
 public function storePWD(Request $request){
  // dd($request->all());  
 $request->validate([
      'name' =>'required',
      'sex' =>'required',
      'civil_status' =>'required',
      'birthdate' =>'required',
      'type_disability' =>'required',
      'cause_disablity' =>'required',
      'status'=>'required',
  ]);   


$pwd = new PWD;
$pwd->name=$request->name;
$pwd->sex=$request->sex;
$pwd->civil_status=$request->civil_status;
$pwd->birthdate=$request->birthdate;
$pwd->status=$request->status;
$pwd->type_disability= json_encode($request->type_disability);
$pwd->cause_disablity= json_encode($request->cause_disablity);
// dd($pwd);
$pwd->save();

return back()->with('message', 'Profiling Complete');
}


//View Pwds Profiling
public function viewPWDProfiling($id){
  $pwdProfiling = PWD::find($id);
  return view('Admin.Profiling.PWD.viewPWDProfiling', ['pwdProfiling'=>$pwdProfiling]);
}


//Admin List of PWDs
public function listPWD(){
  $pwd = PWD::all()->where('status', '=', '1');
  return view('Admin.Profiling.PWD.listPWD',['pwd'=>$pwd]);
}

   //User PWD profiling
   public function pwd(){
    return view('user.Profiling.pwd');
}


   //User PWD profiling
   public function senior(){
    return view('user.Profiling.senior');
}

 //User Pregnant profiling
 public function pregnant(){
  return view('user.Profiling.pregnant');
}

 //User Pregnant Form and Storing Data
 public function storePregnant(Request $request){

  $formFields = $request->validate([
      'name' =>'required',
      'age' =>'required',
      'birthdate' =>'required',
      'weight' =>'required',
      'LMP' =>'required', 
      'EDC' => 'required' 
  ]);

// dd($formFields);
$pregnant = Pregnant::create($formFields);

return back()->with('message', 'Profiling Complete');
}

//Admin List of PWDs
public function listPregnant(){
  $preg = Pregnant::all();
  return view('Admin.Profiling.Pregnant.listPregnant',['preg'=>$preg]);
}

//List of Senior Citizen Profiling
public function pwdProfiling(){
  $pwd = PWD::all()->where('status', '=', '0');
  return view('Admin.Profiling.PWD.pwdProfiling',['pwd'=>$pwd]);
}

//Add to List PWD
public function addListPWD(Request $request, $id){
  $senProfiling = PWD::find($id);
  $status = 1;
  PWD::where('id', $id)->update(['status' => $status]);
  return redirect('/listPWD')->with('message', 'Add to List Completed');
}
}