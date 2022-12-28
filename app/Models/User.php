<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\AdminResidents;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',   
        'password',
        'userType',
        'status',
    ];
    protected static function boot(){
        parent::boot();
    
        static::created(function ($user){
            if($user->userType == 0){
                $user->admin()->create([
                    'username' => $user->username,
                    'password' => $user->password,
                    'userType' => $user->userType,
                    'status' => $user->status
                ]);
            }
            if($user->userType == 1){
                $user->adminResidents()->create([
                    'username' => $user->username,
                    'password' => $user->password,
                    'userType' => $user->userType,
                    'status' => $user->status
                ]);
            }
           
            
        });
    }
    public function admin()
    {
        if($this->userType == 0){
            return $this->hasOne(barangayOfficial::class);
        }
        if($this->userType == 1){
            return $this->hasOne(AdminResidents::class);
        }
    }
    public function adminResidents()
    {
        if($this->userType == 0){
            return $this->hasOne(barangayOfficial::class);
        }
        if($this->userType == 1){
            return $this->hasOne(AdminResidents::class);
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
