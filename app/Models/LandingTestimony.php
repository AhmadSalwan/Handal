<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingTestimony extends Model
{
    protected $table = 'landing_testimony';

    protected $fillable = [
        'name',
        'position',
        'testimonial',
        'photo',
    ];
}
