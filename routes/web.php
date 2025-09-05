<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\QuizController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

>>>>>>> b49f9c21450b5bef8add2d293bbd3988c2b1c152

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
});

require __DIR__.'/auth.php';
<<<<<<< HEAD
=======
Route::get('/home', function () {
    return view('home');
});

Route::get('/learn', function () {
    return view('learn');
});

Route::get('/practice', function () {
    return view('practice');
});

Route::get('/level', function () {
    return view('level');
})->name('level');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
>>>>>>> b49f9c21450b5bef8add2d293bbd3988c2b1c152
