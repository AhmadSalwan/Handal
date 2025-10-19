<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use Illuminate\Http\Request;

class PageController extends Controller
{
     public function data()
    {
        $schools = Schools::all();
        return view('data', compact('schools')); 
    }
     public function daftar()
    {
        return view('daftar'); 
    }
    public function about()
    {
        return view('about'); 
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string',
            'kabupaten' => 'required|string|max:255',
            'email' => 'required|email',
            'npsn' => 'required|string|max:20',
        ]);

        // Simpan data ke database (sementara kita dump dulu)
        // Nanti bisa pakai model Schools untuk simpan ke tabel
        return back()->with('success', 'Pendaftaran berhasil dikirim. Menunggu verifikasi admin.');
    }
}
