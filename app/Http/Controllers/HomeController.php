<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

  public function brngyportfolio()
  {
    return view('user.portfolio-details');
  }

  public function numResidents(){
    $residents = DB::table('admin_residents')
    ->where('status', '=', '1' )->count();

    $male = DB::table('admin_residents')
    ->where('gender','=','Male')
    ->where('status', '=', '1' )->count();

    $female = DB::table('admin_residents')
    ->where('gender','=','Female')
    ->where('status', '=', '1' )->count();

    $voter = DB::table('admin_residents')
    ->where('voter_status','=','Voter')
    ->where('status', '=', '1' )->count();

    $nonvoter = DB::table('admin_residents')
    ->where('voter_status','=','Non Voter')
    ->where('status', '=', '1' )->count();

    $house_no = DB::table('admin_residents')
    ->where('status', '=', '1' )
    ->select('house_no', DB::raw('count(*) as total'))
             ->groupBy('house_no')
             ->get()->count();

    $senior = DB::table('admin_residents')
    ->where('age','>','59')
    ->where('status', '=', '1' )->count();

     $toddler = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','2')
     ->where('age','<=','4')->count();

     $child = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','5')
     ->where('age','<=','12')->count();

     $teen = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','13')
     ->where('age','<=','19')->count();
     
     $adult = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','20')
     ->where('age','<=','39')->count();

    return view('user.home',['residents'=>$residents, 'male'=>$male,'female'=>$female,
    'senior'=>$senior,'voter'=>$voter,'nonvoter'=>$nonvoter,'house_no'=>$house_no, 'toddler'=>$toddler,
    'child'=>$child, 'teen'=>$teen, 'adult'=>$adult]);

   }

   public function landingPage(){
    $residents = DB::table('admin_residents')
    ->where('status', '=', '1' )->count();

    $male = DB::table('admin_residents')
    ->where('gender','=','Male')
    ->where('status', '=', '1' )->count();

    $female = DB::table('admin_residents')
    ->where('gender','=','Female')
    ->where('status', '=', '1' )->count();

    $voter = DB::table('admin_residents')
    ->where('voter_status','=','Voter')
    ->where('status', '=', '1' )->count();

    $nonvoter = DB::table('admin_residents')
    ->where('voter_status','=','Non Voter')
    ->where('status', '=', '1' )->count();

    $house_no = DB::table('admin_residents')
    ->where('status', '=', '1' )
    ->select('house_no', DB::raw('count(*) as total'))
             ->groupBy('house_no')
             ->get()->count();

    $senior = DB::table('admin_residents')
    ->where('age','>','59')
    ->where('status', '=', '1' )->count();

     $toddler = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','2')
     ->where('age','<=','4')->count();

     $child = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','5')
     ->where('age','<=','12')->count();

     $teen = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','13')
     ->where('age','<=','19')->count();
     
     $adult = DB::table('admin_residents')
     ->where('status', '=', '1' )
     ->where('age','>=','20')
     ->where('age','<=','39')->count();

    return view('user.landingpage',['residents'=>$residents, 'male'=>$male,'female'=>$female,
    'senior'=>$senior,'voter'=>$voter,'nonvoter'=>$nonvoter,'house_no'=>$house_no, 'toddler'=>$toddler,
    'child'=>$child, 'teen'=>$teen, 'adult'=>$adult]);

   }
}

