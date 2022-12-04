<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function pieChart(){
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

         $pwd = DB::table('p_w_d_s')
         ->where('status', '=', '1' )->count();

         $senior = DB::table('senior_citizens')
        ->where('status', '=', '1' )->count();

         //   Infant = 0-1 year.
// Toddler = 2-4 yrs.
// Child = 5-12 yrs.
// Teen = 13-19 yrs.
// Adult = 20-39 yrs.
// Middle Age Adult = 40-59 yrs.
// Senior Adult = 60+

         $preg = DB::table('pregnants')
         ->selectRaw('monthname(LMP) as month')
         ->selectRaw('count(id) as residents')
                  ->groupBy('month')->orderBy('LMP')
                  ->get();

                  $month = [];
                  $count = [];
                  foreach($preg as $data)
                  {
                    $month[] = $data->month;
                    $count[] = $data->residents;
                  }

         $fully = DB::table('vaccines')
           ->where('status', '=', '1' )
           ->where('dose', '=', 'Fully Vaccinated' )
           ->count();{
           }

           $partial = DB::table('vaccines')
           ->where('status', '=', '1' )
           ->where('dose', '=', 'Partially Vaccinated' )
           ->count();

           $booster = DB::table('vaccines')
           ->where('status', '=', '1' )
           ->where('dose', '=', 'With Booster' )
           ->count();


        return view('admin.dashboard',['residents'=>$residents, 'male'=>$male,'female'=>$female,
        'senior'=>$senior,'voter'=>$voter,'nonvoter'=>$nonvoter,'house_no'=>$house_no, 'toddler'=>$toddler,
        'child'=>$child, 'teen'=>$teen, 'adult'=>$adult, 'month'=>$month, 'count'=>$count, 'fully'=>$fully, 
        'partial'=>$partial, 'booster'=>$booster, 'pwd'=>$pwd,]);
   
       }
}
