<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PWD extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sex',
        'civil_status',
        'birthdate',
        'type_disability',
        'cause_disablity',
    ];
}
