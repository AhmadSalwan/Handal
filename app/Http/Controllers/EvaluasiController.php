<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class EvaluasiController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'school_id' => 'required|exists:schools,id',
                'category'  => 'required|string',
            ]);

            // Ambil semua nilai radio selain _token, category, school_id, dan next
            $scores = collect($request->except(['_token', 'category', 'school_id', 'next']));

            // Pastikan semua skor dikonversi ke integer sebelum dijumlahkan
            $numericScores = $scores->map(function ($value) {
                return is_numeric($value) ? (int)$value : 0;
            });

            // Hitung total dan jumlah pertanyaan
            $total = $numericScores->sum();
            $jumlahPertanyaan = $numericScores->count();

            // Hindari pembagian nol
            if ($jumlahPertanyaan === 0) {
                return back()->with('error', 'Tidak ada pertanyaan yang dijawab.');
            }

            // Ambil model sekolah
            $school = School::findOrFail($request->school_id);

            // Simpan skor ke kolom sesuai kategori
            $percentage = ($total / $jumlahPertanyaan / 5) * 100;

            switch ($request->category) {
                case 'sdm':
                    $school->score_sdm = $percentage;
                    break;
                case 'infrastruktur':
                    $school->score_infrastruktur = $percentage;
                    break;
                case 'literasi':
                    $school->score_literasi = $percentage;
                    break;
                case 'keamanan':
                    $school->score_keamanan = $percentage;
                    break;
            }

            // Hitung skor keseluruhan (jika semua kategori sudah ada)
            $scoresAvailable = collect([
                $school->score_sdm,
                $school->score_infrastruktur,
                $school->score_literasi,
                $school->score_keamanan,
            ])->filter(fn($v) => is_numeric($v));

            if ($scoresAvailable->count() > 0) {
                $school->skor = $scoresAvailable->sum() / $scoresAvailable->count();
            }

            $school->save();

            // 🚀 Tentukan halaman berikutnya
            $nextRoute = match ($request->category) {
                'sdm'           => route('evaluasi.infrastruktur', $school->id),
                'infrastruktur' => route('evaluasi.literasi', $school->id),
                'literasi'      => route('evaluasi.keamanan', $school->id),
                'keamanan'      => null, // tahap terakhir
                default         => null,
            };

            // Jika masih ada tahap berikutnya → redirect ke sana
            if ($nextRoute) {
                return redirect($nextRoute)
                    ->with('success', 'Evaluasi ' . ucfirst($request->category) . ' berhasil disimpan! Lanjut ke tahap berikutnya.');
            }

            // ✅ Jika sudah tahap terakhir (keamanan), arahkan ke halaman utama evaluasi sekolah
            $redirectUrl = url('/evaluasi/' . $school->id);

            return redirect($redirectUrl)
                ->with('success', 'Evaluasi berhasil disimpan! Semua tahap telah selesai.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa input Anda.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan saat menyimpan: ' . $e->getMessage());
        }
    }

    public function start($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_tema', compact('school'));
    }

    public function sdm($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_sdm', compact('school'));
    }

    public function infrastruktur($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_infrastruktur', compact('school'));
    }

    public function literasi($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_sosial', compact('school'));
    }

    public function keamanan($schoolId)
    {
        $school = School::findOrFail($schoolId);
        return view('evaluation.evaluasi_keamanan', compact('school'));
    }

    public function evaluate($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $skor   = $school->skor ?? 0;

        // Tentukan rating berdasarkan skor
        switch (true) {
            case ($skor <= 30):
                $school->rating = '-';
                break;
            case ($skor > 30 && $skor <= 50):
                $school->rating = 'Silver';
                break;
            case ($skor > 51 && $skor <= 75):
                $school->rating = 'Gold';
                break;
            case ($skor > 76 && $skor <= 85):
                $school->rating = 'Platinum';
                break;
            case ($skor > 86 && $skor <= 100):
                $school->rating = 'Diamond';
                break;
        }

        $school->save();

        return redirect()->back()->with('success', 'Rating berhasil dihitung dan disimpan!');
    }
}
