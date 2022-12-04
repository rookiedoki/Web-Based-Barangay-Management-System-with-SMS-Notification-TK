<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreqAskedTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'frq_asked_title',
    ];
    
}
