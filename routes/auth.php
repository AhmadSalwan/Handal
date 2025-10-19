<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    
    Route::get('/admin_view', [SchoolController::class, 'admin_index'])->name('schools.index');
    Route::post('/admin/schools/{school}/verify', [SchoolController::class, 'verify'])->name('schools.verify');    
    Route::post('/admin/schools/{school}/unverify', [SchoolController::class, 'unverify'])->name('schools.unverify');    
    Route::get('/daftar',[App\Http\Controllers\SchoolController::class, 'create'])->name('daftar');
    Route::post('/daftar',[App\Http\Controllers\SchoolController::class, 'store'])->name('daftar.submit');
    Route::get('/download/{id}', function ($id) {
    $school = App\Models\School::findOrFail($id);
    $filePathInDb = $school->assessment_file;

    // Mendapatkan PATH ABSOLUT yang DIBENTUK oleh Flysystem/Laravel
    $absolutePath = Storage::disk('public')->path($filePathInDb);

    // Cek apakah file benar-benar ada di lokasi yang dibentuk oleh Laravel
    if (file_exists($absolutePath)) {
        // Jika file DITEMUKAN, lanjutkan download.
        
        $fileName = $school->assessment_original_name ?? basename($filePathInDb);
        if($fileName!=null){
        return response()->download($absolutePath, $fileName);
        }else{
            dd("File NOT FOUND! filename Null~!:", $fileName);
        }
        // ATAU
        // return Storage::disk('public')->download($filePathInDb);
    } else {
        // Jika TIDAK ditemukan, tampilkan path untuk diperiksa
        dd("File NOT FOUND! Laravel mencari di path absolut ini:", $absolutePath);
    }})->name('file.download');
    Route::get('/preview/{id}', function ($id) {
        $school = App\Models\School::findOrFail($id);
        $filePathInDb = $school->assessment_file;
        $filepath = Storage::disk('public')->path($filePathInDb);
        if($filePathInDb!=null){
            return response()->file($filepath);
        }else{
            dd("File NOT FOUND! filename Null~!:");
        };
    })->name('file.preview');

    Route::get('/evaluation', function () {
        return view('evaluation.evaluasi_sdm');
    })->name('eval_sdm');
    
    Route::get('/evaluation2', function () {
        return view('evaluation.evaluasi_infrastruktur');
    })->name('eval_infra');
    
    Route::get('/evaluation3', function () {
        return view('evaluation.evaluasi_keamanan');
    })->name('eval_keamanan');

    Route::get('/evaluation4', function () {
        return view('evaluation.evaluasi_sosial');
    })->name('eval_keamanan');

    Route::post('/evaluasi/store', [EvaluasiController::class, 'store'])->name('evaluasi.store');
    Route::get('/evaluasi/{school}/sdm', [EvaluasiController::class, 'sdm'])->name('evaluasi.sdm');
    Route::get('/evaluasi/{school}/infrastruktur', [EvaluasiController::class, 'infrastruktur'])->name('evaluasi.infrastruktur');
    Route::get('/evaluasi/{school}/literasi', [EvaluasiController::class, 'literasi'])->name('evaluasi.literasi');
    Route::get('/evaluasi/{school}/keamanan', [EvaluasiController::class, 'keamanan'])->name('evaluasi.keamanan');
    Route::get('/evaluasi/{school}', [EvaluasiController::class, 'start'])->name('evaluasi.start');
    Route::get('/evaluation/{school}', [EvaluasiController::class, 'evaluate'])->name('evaluation.calculate'); 
    
    // kuis
    Route::get('/quis', function () {
        return view('questionnaire.general');
    })->name('quisss');
    

});
