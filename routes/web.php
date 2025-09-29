<?php

use App\Http\Controllers\LearnController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('start');
})->name('start');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Profile - harus login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatephoto'])->name('profile.update_photo');
    Route::post('/photo/delete', [ProfileController::class, 'deletePhoto'])->name('profile.delete_photo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Socialite Google login
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google.callback');
});

// Auth routes (register, login, logout)
require __DIR__.'/auth.php';

// Home - langsung bisa diakses tanpa harus verified email
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

// Learn routes - harus login
Route::middleware('auth')->group(function () {
    Route::get('/learn', [LearnController::class, 'index'])->name('learn.index');
    Route::get('/learn/{group}', [LearnController::class, 'show'])->name('learn.show');
    Route::post('/learn/{group}/progress', [LearnController::class, 'updateProgress'])->name('learn.updateProgress');
});

// Practice routes
Route::get('/practice', [PracticeController::class, 'index'])->name('practice');

// Simulation routes
Route::get('/practice/simulation/question/{id}', [SimulationController::class, 'getQuestion'])
    ->whereNumber('id')
    ->name('simulation.getQuestion');

Route::get('/practice/simulation', [SimulationController::class, 'showSimulation'])
    ->name('simulation.show');

// Quiz routes
Route::get('/practice/quiz/{category}', [QuizController::class, 'show'])->name('quiz.show');
