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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('/offers','OfferController')->middleware('verified');

Route::resource('/admin','AdminController');

Route::get('test', function() {
    Mail::send('Email.test', [], function ($message) {
        $message->to('jc29advincula@gmail.com', 'HisName')->subject('Welcome!');
    });
});