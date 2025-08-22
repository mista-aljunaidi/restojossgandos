<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('menu', function () {
    return view('menu');
});

Route::get('gallery', function () {
    return view('gallery');
});

Route::get('location', function () {
    return view('lokasi');
});