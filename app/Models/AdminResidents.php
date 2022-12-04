<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminResidents extends Model
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
        'house_no',
        'gender',
        'voter_status',
        'citizenship',
        'email',
        'phone_number',
        'occupation',
        'work_status',
        'resident_image',
        'password',
        'userType',
        'status',
    ];

    public function scopeFilter($query, array $filters){

        if($filters['search'] ?? false){
            $query->where('first_name', 'like', '%' . request('search') . '%')
               ->orWhere('middle_name', 'like', '%' . request('search') . '%')
               ->orWhere('last_name', 'like', '%' . request('search') . '%')
               ->orwhere('age', 'like', '%' . request('search') . '%');
            //    ->orWhere('work_status', 'like', '%' . request('search') . '%');

        }

    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
