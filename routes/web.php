<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SimulationController;  
use App\Models\User;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('start');
})->name('start');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatephoto'])->name('profile.update_photo');
    Route::post('/photo/delete', [ProfileController::class, 'deletePhoto'])->name('profile.delete_photo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(SocialiteController::class)->group(function() {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google.callback');
});

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/learn', [LearnController::class, 'index'])->name('learn.index');
Route::get('/learn/{id}', [LearnController::class, 'show'])->name('learn.show');

Route::get('/practice', function () {
    return view('practice');
})->name('practice');


Route::get('/level', function () {
    return view('level');
})->name('level');

// Route untuk quiz dengan parameter level dan category
Route::get('/quiz/{level?}/{category?}', [QuizController::class, 'quiz'])
    ->where(['level' => 'newbie|intermediate|expert', 'category' => 'grammar|vocabulary|reading'])
    ->name('quiz');

// Route untuk simulation - taruh yang lebih spesifik dulu
Route::get('/simulation/question/{id}', [SimulationController::class, 'getQuestion'])
    ->whereNumber('id')
    ->name('simulation.getQuestion');

Route::get('/simulation', [SimulationController::class, 'showSimulation'])
    ->name('simulation.show');
