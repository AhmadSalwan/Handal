<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingContent extends Model
{
    protected $table = 'landing_content';

    protected $fillable = [
        'tentang_program_content',
        'visi_content',
        'misi_content'
    ];
}
