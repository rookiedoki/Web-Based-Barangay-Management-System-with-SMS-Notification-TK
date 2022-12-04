<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
      'admin_image',   
      'first_name',   
      'last_name',
      'position',
      'email',   
      'password',
      'userType',
  ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
