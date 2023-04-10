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

//Main Page

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

//Cities

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

//Jakarta

Route::get('/home/destinations/jakarta/monas', function(){
    $lokasi = 1;
    $kota = 1;
    return view('location', compact('lokasi', 'kota'));
})->name('monas');
 
Route::get('/home/destinations/jakarta/ancol', function(){
    $lokasi = 2;
    $kota = 1;
    return view('location', ['post' => $post]);
})->name('ancol');
 
Route::get('/home/destinations/jakarta/istiqlal', function(){
    $lokasi = 3;
    $kota = 1;
    return view('location', compact('lokasi', 'kota'));
})->name('istiqlal');
 
Route::get('/home/destinations/jakarta/glodok', function(){
    $lokasi = 4;
    $kota = 1;
    return view('location', compact('lokasi', 'kota'));
})->name('glodok');

Route::get('/home/destinations/jakarta/cathedral', function(){
    $lokasi = 5;
    $kota = 1;
    return view('location', compact('lokasi', 'kota'));
})->name('cathedral');

Route::get('/home/destinations/jakarta/tmii', function(){
    $lokasi = 6;
    $kota = 1;
    return view('location', compact('lokasi', 'kota'));
})->name('tmii');

//Bandung

Route::get('/home/destinations/bandung/cigadung', function(){
    $lokasi = 1;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('cigadung');

Route::get('/home/destinations/bandung/kiara', function(){
    $lokasi = 2;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('kiara');

Route::get('/home/destinations/bandung/kuliner', function(){
    $lokasi = 3;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('kuliner');

Route::get('/home/destinations/bandung/siliwangi', function(){
    $lokasi = 4;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('siliwangi');

Route::get('/home/destinations/bandung/tangga', function(){
    $lokasi = 5;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('tangga');

Route::get('/home/destinations/bandung/wetland', function(){
    $lokasi = 6;
    $kota = 2;
    return view('location', compact('lokasi', 'kota'));
})->name('wetland');