<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{

   protected $table = 'career_applications';

   
     protected $fillable = [
    'full_name',
    'email',
    'phone',
    'position',
    'experience',
    'motivation',
    'resume'
];
}
