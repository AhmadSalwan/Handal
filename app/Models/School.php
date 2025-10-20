<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenjang',
        'kabupaten',
        'email',
        'npsn',
        'is_verified',
        'assessment_file',
        'assessment_original_name', 
    ];
     public function digitalActivities()
    {
        return $this->hasOne(SchoolDigitalActivity::class);
    }
}
