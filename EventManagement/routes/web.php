<?php

use App\Http\Controllers\EventController; // Import the EventController class
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController; // Import the GalleryController class
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/events', EventController::class);
    Route::resource('galleries',GalleryController::class);

});

require __DIR__.'/auth.php';
