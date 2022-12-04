<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_name',
        'barangay_logo',
        'barangay_logo2',
        'brgy_location',
        'brgy_email',
        'description',
        'vission',
        'mission',
        'goal',
        'system_logo',
        'system_title',
        'about_section1',
        'about_section2',
    ];
}
