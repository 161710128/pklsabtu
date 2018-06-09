<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/baru', function () {
    return view('layouts.layout');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cek', function () {
    return view('layouts.admin');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function () {
        Route::resource('user','userController');
        Route::resource('perusahaan','perusahaanController');
        Route::resource('member','memberController');
        Route::resource('lowongan','lowonganController');
        Route::resource('lamaran','lamaranController');

});

Route::group(['prefix'=>'member', 'Middleware'=>['auth','role:member']], function () {
    // Route::resource('user','userController');
    // Route::resource('perusahaan','perusahaanController');
    // Route::resource('member','memberController');
    // Route::resource('lowongan','lowonganController');
    // Route::resource('lamaran','lamaranController');

});
Route::get('/cek', function () {
    return view('layouts.login');
});

