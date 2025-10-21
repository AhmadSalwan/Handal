<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('data', compact('schools'));
    }

    public function admin_index()
    {
       if (Gate::allows('admin-area')) {
        $schools = School::all();
        return view('dashboard', compact('schools'));
        
    } else {    
        return redirect('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin Admin.');
    }
    }
    /**
     */
    public function create()
    {
        return view('daftar');
        //
    }

    public function rangking()
    {
        // Ambil 3 sekolah dengan skor tertinggi
        $schools = \App\Models\School::orderByDesc('skor')
                    ->take(3)
                    ->get();

        return view('rangking', compact('schools'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jenjang' => 'required',
        'kabupaten' => 'required',
        'email' => 'required|email|unique:schools,email',
        'npsn' => 'required|unique:schools,npsn',
        'assessment_file' => 'nullable|file|mimes:pdf|max:2048',
        'assessment_original_name' => 'nullable|string',
        'kontak' => 'required|string|max:15',
        'kecamatan' => 'required', 
        'kelurahan' => 'required',   
        'nama_jalan' => 'required',
    ]);

    $filename = null;
    $originalName = null;
    if ($request->hasFile('assessment_file')) {
        $file = $request->file('assessment_file');
        $path = $file->store('assessments', 'public');
        $originalName = $file->getClientOriginalName();
    }

    $school = School::create([
        'nama'            => $request->nama,
        'jenjang'         => $request->jenjang,
        'kabupaten'       => $request->kabupaten,
        'email'           => $request->email,
        'npsn'            => $request->npsn,
        'assessment_file' => $path ?? null,
        'assessment_original_name' => $originalName ?? null,
        'kontak'          => $request->kontak,
        'kecamatan' => $request->kecamatan, 
        'kelurahan' => $request->kelurahan, 
        'nama_jalan' => $request->nama_jalan, 
    ]);
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            $user->role = 'school';
            $user->save();
        }
    }

    return redirect()->route('daftar')
        ->with('success', 'Data Disimpan. Silahkan menunggu verifikasi admin!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('schools.edit', compact('school'));   
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, School $school)
    {
        $request->validate([
            'nama' => 'required',
            'jenjang' => 'required',
            'kabupaten' => 'required',
            'email' => 'required|email|unique:schools,email,' . $school->id,
            'npsn' => 'required|unique:schools,npsn,' . $school->id,
        ]);

        $school->update($request->all());

        return redirect()->route('schools.index')
                         ->with('success', 'Sekolah berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('schools.index')
                         ->with('success', 'Sekolah berhasil dihapus.');
    }

    public function verify(School $school)
    {
        $school->update(['is_verified' => true]);

        return redirect()->route('schools.index')
            ->with('success', 'Sekolah berhasil diverifikasi.');
    }

    public function unverify(School $school)
    {
        $school->update(['is_verified' => false]);

        return redirect()->route('schools.index')
            ->with('cancelled', 'Sekolah batal diverifikasi.');
    }

}
