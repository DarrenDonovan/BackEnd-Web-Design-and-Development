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

Route::get('/account', function(){
    return view('account');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/blog', function(){
    return view('blog');
});

Route::get('/destinations', function(){
    return view('destinations');
});

Route::get('/services', function(){
    return view('services');
});

Route::get('/product', function(){
    return view('product');
});

Route::get('/city', function(){
    return view('city');
});

Route::get('/location', function(){
    return view('location');
});