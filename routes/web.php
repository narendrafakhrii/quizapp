<?php

use App\Http\Controllers\LearnController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
})->name('start');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatephoto'])->name('profile.update_photo');
    Route::post('/photo/delete', [ProfileController::class, 'deletePhoto'])->name('profile.delete_photo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google.callback');
});

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/learn', [LearnController::class, 'index'])->name('learn.index');
    Route::get('/learn/{group}', [LearnController::class, 'show'])->name('learn.show');
    Route::post('/learn/{group}/progress', [LearnController::class, 'updateProgress'])->name('learn.updateProgress');
});


Route::get('/practice', [PracticeController::class, 'index'])->name('practice');

// Route untuk simulation - taruh yang lebih spesifik dulu
Route::get('/practice/simulation/question/{id}', [SimulationController::class, 'getQuestion'])
    ->whereNumber('id')
    ->name('simulation.getQuestion');

Route::get('/practice/simulation', [SimulationController::class, 'showSimulation'])
    ->name('simulation.show');

Route::get('/practice/quiz/{category}', [QuizController::class, 'show'])->name('quiz.show');
