<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolDigitalActivity extends Model
{
    use HasFactory;
    
    // Tentukan nama tabel secara eksplisit
    protected $table = 'school_digital_activities';

    // Izinkan Mass Assignment untuk semua kolom (kecuali yang dijaga oleh Laravel)
    protected $guarded = []; 

    // Relasi One-to-One dengan School
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
