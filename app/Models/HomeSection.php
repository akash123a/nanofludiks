<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    //
        protected $table = 'home_sections';

    protected $fillable = [
        'title',
        'subtitle',
        'heading',
        'description1',
        'description2',
        'description3',
        'image'
    ];
}
