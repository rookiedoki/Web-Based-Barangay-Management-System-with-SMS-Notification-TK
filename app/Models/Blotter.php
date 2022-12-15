<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blotter extends Model
{
  use HasFactory, SoftDeletes;
  protected $fillable = [
    'complainant',
    'respondent',
    'victim',
    'location',
    'date',
    'time',
    'details',
    'proof',
    'phone_number',
    'status',
  ];
}
