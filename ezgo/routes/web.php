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

Route::get('/admin', function(){
    $currentUrl = url()->current();
    return response()
        ->view('admin')
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('admin');

//admin page

Route::post('/modding', 'App\Http\Controllers\Controller@Mod');

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

//services

Route::get('/home/services/tickets', function(){
    $post = 1;
    $currentUrl = url()->current();
    return response()
        ->view('product', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('ticket');

Route::get('/home/services/hotels', function(){
    $post = 2;
    $currentUrl = url()->current();
    return response()
        ->view('product', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('hotel');

Route::get('/home/services/tours', function(){
    $post = 3;
    $currentUrl = url()->current();
    return response()
        ->view('product', ['post' => $post])
        ->cookie('currentUrl', $currentUrl, 6*60);
})->name('tour');

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

//products

Route::post('/check', 'App\Http\Controllers\ProductController@Modal');

Route::post('/sort', 'App\Http\Controllers\ProductController@Sort');

Route::post('/sessionGet', 'App\Http\Controllers\Controller@SessionGet');

Route::post('/imag', 'App\Http\Controllers\Controller@img');

Route::post('/purchase', 'App\Http\Controllers\ProductController@Purchase');

//account

Route::post('/update', 'App\Http\Controllers\Controller@update')->name('update');

Route::post('/details', 'App\Http\Controllers\Controller@detail')->name('details');

//blog

Route::post('/change', 'App\Http\Controllers\BlogController@change')->name('change');

Route::post('/like', 'App\Http\Controllers\BlogController@like')->name('like');

Route::post('/comment', 'App\Http\Controllers\BlogController@comment')->name('comment');

Route::post('/add', 'App\Http\Controllers\BlogController@add')->name('add');

Route::post('/jump', 'App\Http\Controllers\BlogController@jump')->name('jump');




