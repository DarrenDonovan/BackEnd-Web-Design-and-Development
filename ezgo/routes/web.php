<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'App\Http\Controllers\Controller@login');

Route::post('/signup', 'App\Http\Controllers\Controller@signup');

Route::get('/home', function(){
    $currentUrl = url()->current();
    return response()
        ->view('index')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('home');

//Main Page

Route::get('/home/account', function(){
    $currentUrl = url()->current();
    return response()
        ->view('account')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('account');

Route::get('/home/about', function(){
    $currentUrl = url()->current();
    return response()
        ->view('about')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('about');

Route::get('/home/blog', function(){
    $currentUrl = url()->current();
    return response()
        ->view('blog')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('blog');

Route::get('/home/destinations', function(){
    $currentUrl = url()->current();
    return response()
        ->view('destinations')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('destinations');

Route::get('/home/services', function(){
    $currentUrl = url()->current();
    return response()
        ->view('services')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('services');

Route::get('/home/product', function(){
    $currentUrl = url()->current();
    return response()
        ->view('product')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('product');

//Cities

Route::get('/home/destinations/jakarta', function(){
    $post = 1;
    $currentUrl = url()->current();
    return response()
        ->view('city', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('city1');

Route::get('/home/destinations/bandung', function(){
    $post = 2;
    $currentUrl = url()->current();
    return response()
        ->view('city', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('city2');

Route::get('/home/destinations/surabaya', function(){
    $post = 3;
    $currentUrl = url()->current();
    return response()
        ->view('city', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('city3');

Route::get('/home/destinations/denpasar', function(){
    $post = 4;
    $currentUrl = url()->current();
    return response()
        ->view('city', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('city4');

//Jakarta

Route::get('/home/destinations/jakarta/monas', function(){
    $lokasi = 1;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('monas');
 
Route::get('/home/destinations/jakarta/ancol', function(){
    $lokasi = 2;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('ancol');
 
Route::get('/home/destinations/jakarta/istiqlal', function(){
    $lokasi = 3;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('istiqlal');
 
Route::get('/home/destinations/jakarta/glodok', function(){
    $lokasi = 4;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('glodok');

Route::get('/home/destinations/jakarta/cathedral', function(){
    $lokasi = 5;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('cathedral');

Route::get('/home/destinations/jakarta/tmii', function(){
    $lokasi = 6;
    $kota = 1;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('tmii');

//Bandung

Route::get('/home/destinations/bandung/cigadung', function(){
    $lokasi = 1;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('cigadung');

Route::get('/home/destinations/bandung/kiara', function(){
    $lokasi = 2;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('kiara');

Route::get('/home/destinations/bandung/kuliner', function(){
    $lokasi = 3;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('kuliner');

Route::get('/home/destinations/bandung/siliwangi', function(){
    $lokasi = 4;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('siliwangi');

Route::get('/home/destinations/bandung/tangga', function(){
    $lokasi = 5;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('tangga');

Route::get('/home/destinations/bandung/wetland', function(){
    $lokasi = 6;
    $kota = 2;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('wetland');

//Surabaya

Route::get('/home/destinations/surabaya/10november', function(){
    $lokasi = 1;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('10november');

Route::get('/home/destinations/surabaya/arab', function(){
    $lokasi = 2;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('arab');

Route::get('/home/destinations/surabaya/kelenteng', function(){
    $lokasi = 3;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('kelenteng');

Route::get('/home/destinations/surabaya/pakuwon', function(){
    $lokasi = 4;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('pakuwon');

Route::get('/home/destinations/surabaya/sampoerna', function(){
    $lokasi = 5;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('sampoerna');

Route::get('/home/destinations/surabaya/tugu', function(){
    $lokasi = 1;
    $kota = 3;
    $currentUrl = url()->current();
    return response()
        ->view('location', compact('lokasi', 'kota'))
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('tugu');