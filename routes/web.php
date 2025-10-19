<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/data',[App\Http\Controllers\SchoolController::class, 'index'])->name('data');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
      Route::get('/download/{id}', function ($id) {
    $school = App\Models\School::findOrFail($id);
     $filePath = $school->assessment_file; 
    
    // Opsional: Cek apakah file ada sebelum mencoba download
    if (!Storage::exists($filePath)) {
        abort(404, 'File tidak ditemukan.');
    }
    
    // Ambil nama file asli (atau yang ingin Anda gunakan untuk download)
    $fileName = basename($filePath); 
    
    // Gunakan download()
    return Storage::download($filePath, $fileName); 
    
    })->name('file.download');
});


require __DIR__.'/auth.php';
