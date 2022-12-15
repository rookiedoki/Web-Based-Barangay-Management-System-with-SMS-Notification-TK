<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSMessages extends Model
{
    protected $table= "smsmessages";
    protected $fillable = [
        'phone_number'
    ];
}
