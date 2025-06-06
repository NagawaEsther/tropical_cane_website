<?php

use Illuminate\Support\Facades\Route;
use App\Models\Juice;
use App\Models\HealthyTip;

// Frontend routes

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/juices', function () {
    $juices = Juice::all();
    return view('frontend.juices', compact('juices'));
});

Route::get('/tips', function () {
    $tips = HealthyTip::all();
    return view('frontend.tips', compact('tips'));
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

// Voyager Admin routes

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
