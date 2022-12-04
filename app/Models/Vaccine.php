<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'birthdate',
        'vaccine_type',
        'address',
        'dose',
        'date_first',
        'date_second',
        'booster_date',
        'vaccine_image',
        'status',
    ];
}
