<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorCitizen extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birthdate',
        'age',
        'gender',
        'status',
        'osca_no',
        'date_issue',
        'senior_id',
    ];
}
