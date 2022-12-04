<?php

namespace App\Http\Controllers\Helper;

use App\Models\ActivityLog as ModelsActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityLog
{

  public static function log($action, $table_name,  $table_id)
  {

    // logged user 
    $user = Auth::guard('barangay_official')->user();
    // logged user id
    if (Auth::user()) {
      $user = Auth::user();
    }

    $user_name = null;
    if ($user != null) {
      if ($user->name != null) {
        $user_name = $user->name;
      } else {
        $user_name = $user->fname;
      }
    }

    $log = new ModelsActivityLog();
    $log->user_id = $user->id ?? 0;
    $log->action = ($user_name ?? 'Guest') . ' ' . $action;
    $log->table_name = $table_name;
    $log->table_id = $table_id;
    $log->save();
  }
}
