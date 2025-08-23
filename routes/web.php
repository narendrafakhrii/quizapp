<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/learn', function () {
    return view('learn');
});

Route::get('/practice', function () {
    return view('practice');
});