<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'username',
        'password',
        'userType',
        'status',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
