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

Route::get('/account', function(){
    return view('account');
})->name('account');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/blog', function(){
    return view('blog');
})->name('blog');

Route::get('/destinations', function(){
    return view('destinations');
})->name('destinations');

Route::get('/services', function(){
    return view('services');
})->name('services');

Route::get('/product', function(){
    return view('product');
})->name('product');

Route::get('/jakarta', function(){
    $post = 1;
    return view('city', ['post' => $post]);
})->name('city1');

Route::get('/bandung', function(){
    $post = 2;
    return view('city', ['post' => $post]);
})->name('city2');

Route::get('/surabaya', function(){
    $post = 3;
    return view('city', ['post' => $post]);
})->name('city3');

Route::get('/denpasar', function(){
    $post = 4;
    return view('city', ['post' => $post]);
})->name('city4');

Route::get('/monas', function(){
    $post = 1;
    return view('location', ['post' => $post]);
})->name('monas');
 
Route::get('/ancol', function(){
    $post = 2;
    return view('location', ['post' => $post]);
})->name('ancol');
 
Route::get('/istiqlal', function(){
    $post = 3;
    return view('location', ['post' => $post]);
})->name('istiqlal');
 
Route::get('/glodok', function(){
    $post = 4;
    return view('location', ['post' => $post]);
})->name('glodok');

Route::get('/cathedral', function(){
    $post = 5;
    return view('location', ['post' => $post]);
})->name('cathedral');

Route::get('/tmii', function(){
    $post = 6;
    return view('location', ['post' => $post]);
})->name('tmii');

Route::get('/location', function(){
    return view('location');
})->name('location');