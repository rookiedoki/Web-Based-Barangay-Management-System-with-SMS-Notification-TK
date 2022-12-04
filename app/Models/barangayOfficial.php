<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangayOfficial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'birthdate',
        'gender',
        'position',
        'phone_number',
        'email',
        'official_image',
    ];
}
