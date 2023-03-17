<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'App\Http\Controllers\Controller@login');

Route::post('/signup', 'App\Http\Controllers\Controller@signup');

Route::get('/home', function(){
    return view('index');
});