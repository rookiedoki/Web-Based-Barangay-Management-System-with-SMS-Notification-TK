<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'nickname',
        'place_of_birth',
        'birthdate',
        'age',
        'civil_status',
        'street',
        'gender',
        'voter_status',
        'citizenship',
        'email',
        'phone_number',
        'occupation',
        'profile_image',
        'image_id-birth',
        'password',
    ];
}
