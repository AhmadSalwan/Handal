<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CMS\LandingContentController;
use App\Http\Controllers\CMS\LandingTestimonyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/data',[SchoolController::class, 'index'])->name('data');

Route::get('/admin_view', [SchoolController::class, 'admin_index'])->name('schools.index');

Route::get('/dashboard', [SchoolController::class, 'admin_index'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    // Single-row edit/update
    Route::get('landingcontent/edit', [LandingContentController::class, 'edit'])->name('landingcontent.edit');
    Route::put('landingcontent/update', [LandingContentController::class, 'update'])->name('landingcontent.update');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('landingtestimony', LandingTestimonyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
      Route::get('/download/{id}', function ($id) {
    $school = App\Models\School::findOrFail($id);
     $filePath = $school->assessment_file; 

    if (!Storage::exists($filePath)) {
        abort(404, 'File tidak ditemukan.');
    }
        $fileName = basename($filePath); 
    return Storage::download($filePath, $fileName); 
    })->name('file.download');
});
require __DIR__.'/auth.php';
