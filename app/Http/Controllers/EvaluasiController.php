<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class EvaluasiController extends Controller
{
    public function store(Request $request)
    {
        try{
        $validated = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'category' => 'required|string',
        ]);

        // Ambil semua nilai radio selain _token, category, school_id
        $scores = collect($request->except(['_token', 'category', 'school_id']));

        // Hitung rata-rata skor kategori
        $total = $scores->sum();
        $jumlahPertanyaan = $scores->count();

        // Ambil model sekolah
        $school = School::findOrFail($request->school_id);

        // Simpan ke kolom sesuai kategori
        switch ($request->category) {
            case 'sdm':
                $school->score_sdm = ($total/$jumlahPertanyaan/5) * 100; 
                break;
            case 'infrastruktur':
                $school->score_infrastruktur =($total/$jumlahPertanyaan/5) * 100;
                break;
            case 'literasi':
                $school->score_literasi = ($total/$jumlahPertanyaan/5) * 100;
                break;
            case 'keamanan':
                $school->score_keamanan = ($total/$jumlahPertanyaan/5) * 100;
                break;
        }

        // Hitung total kalau sudah ada semua
        $overall_score = collect([
            $school->score_sdm,
            $school->score_infrastruktur,
            $school->score_literasi,
            $school->score_keamanan,
        ])->filter()->sum();
        $final_score = $overall_score / 4;

        $school->skor = $final_score;

        $school->save();

        return redirect()->back()->with('success', 'Evaluasi ' . ucfirst($request->category) . ' berhasil disimpan!');
        }catch (\Illuminate\Validation\ValidationException $e) {
        // Tangani error validasi
        return back()
            ->withErrors($e->validator)
            ->withInput()
            ->with('error', 'Validasi gagal. Periksa input Anda.');
    }
        catch (\Exception $e) {
        // Tangani error umum (misalnya error DB)
        return back()
            ->with('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
    }
    }
    public function start($schoolId)
    {
        $school = \App\Models\School::findOrFail($schoolId);

        return view('evaluation.evaluasi_tema', compact('school'));
    }

     public function sdm($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_sdm', compact('school'));
    }

    /**
     * Evaluasi Infrastruktur
     */
    public function infrastruktur($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_infrastruktur', compact('school'));
    }

    /**
     * Evaluasi Literasi & Kesadaran Digital
     */
    public function literasi($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_sosial', compact('school'));
    }

    /**
     * Evaluasi Keamanan Digital
     */
    public function keamanan($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_keamanan', compact('school'));
    }
    public function evaluate($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $skor=$school->skor;
        switch (true) {
            case ($skor <=30):
                $school->rating = '-'; 
                break;
            case ($skor >30 && $skor <=50):
                $school->rating ='Silver';
                break;
            case ($skor >51 && $skor <=75):
                $school->rating ='Gold';
                break;
            case ($skor >76 && $skor <=85):
                $school->rating ='Platinum';
                break;    
            case ($skor >86 && $skor <=100):
                $school->rating ='Diamond';
                break;    
        }
        $school->save();
        return redirect()->back()->with('success', 'Rating berhasil dihitung dan disimpan!');
    }
}