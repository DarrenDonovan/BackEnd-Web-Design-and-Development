<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'App\Http\Controllers\Controller@login');

Route::post('/signup', 'App\Http\Controllers\Controller@signup');

Route::get('/home', function(){
    return view('index');
})->name('home');

Route::get('/home/account', function(){
    return view('account');
})->name('account');

Route::get('/home/about', function(){
    return view('about');
})->name('about');

Route::get('/home/blog', function(){
    return view('blog');
})->name('blog');

Route::get('/home/destinations', function(){
    return view('destinations');
})->name('destinations');

Route::get('/home/services', function(){
    return view('services');
})->name('services');

Route::get('/home/product', function(){
    return view('product');
})->name('product');

Route::get('/home/destinations/jakarta', function(){
    $post = 1;
    return view('city', ['post' => $post]);
})->name('city1');

Route::get('/home/destinations/bandung', function(){
    $post = 2;
    return view('city', ['post' => $post]);
})->name('city2');

Route::get('/home/destinations/surabaya', function(){
    $post = 3;
    return view('city', ['post' => $post]);
})->name('city3');

Route::get('/home/destinations/denpasar', function(){
    $post = 4;
    return view('city', ['post' => $post]);
})->name('city4');

Route::get('/home/destinations/jakarta/monas', function(){
    $post = 1;
    return view('location', ['post' => $post]);
})->name('monas');
 
Route::get('/home/destinations/jakarta/ancol', function(){
    $post = 2;
    return view('location', ['post' => $post]);
})->name('ancol');
 
Route::get('/home/destinations/jakarta/istiqlal', function(){
    $post = 3;
    return view('location', ['post' => $post]);
})->name('istiqlal');
 
Route::get('/home/destinations/jakarta/glodok', function(){
    $post = 4;
    return view('location', ['post' => $post]);
})->name('glodok');

Route::get('/home/destinations/jakarta/cathedral', function(){
    $post = 5;
    return view('location', ['post' => $post]);
})->name('cathedral');

Route::get('/home/destinations/jakarta/tmii', function(){
    $post = 6;
    return view('location', ['post' => $post]);
})->name('tmii');