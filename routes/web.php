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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/offers','OfferController')->middleware('verified');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/home', 'AdminController@index')->name('admin.home');

    //routes for loans
    Route::resource('/loans', 'LoanController');
    Route::post('/loans/specification', 'LoanController@storeSpecs')->name('loan.spec');
    Route::post('/loans/purpose', 'LoanController@storePurpose')->name('loan.purpose');
});
