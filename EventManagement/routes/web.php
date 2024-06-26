<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DbEventShowController;
use App\Http\Controllers\DeleteCommentController;
use App\Http\Controllers\EventController; // Import the EventController class
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController; // Import the GalleryController class
use App\Http\Controllers\LikedEventController; // Import the LikedEventsController class
use Illuminate\Support\Facades\Route;
use App\Models\Country; // Import the Country class
use App\Http\Controllers\WelcomeController; // Import the WelcomeController class
use App\Http\Controllers\EventShowController; // Import the EventShowController class
use App\Http\Controllers\LikeSystemController;
use App\Http\Controllers\StoreCommentController; // Import the StoreCommentController class

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/e/{id}', EventShowController::class)->name('eventShow');
Route::get('/dashboard', DashBoardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/e/{id}', DbEventShowController::class)->name('dbEventShow');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/events', EventController::class);
    Route::resource('galleries',GalleryController::class);
    Route::post('/events-like/{id}', LikeSystemController::class)->name('events.like');
    Route::post('/events/{id}/comments', StoreCommentController::class)->name('events.comments');
    Route::delete('/events/{id}/comments/{comment}', DeleteCommentController::class)->name('events.comments.destroy');

    Route::get('/liked-events', LikedEventController::class)->name('likedEvents');
});

    Route::get('/countries/{country}', function (Country $country) {
        return response()->json($country->cities);
    });



require __DIR__.'/auth.php';
