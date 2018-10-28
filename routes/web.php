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
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    //routes for users
    Route::resource('/users','Admin\AdminController');

    //routes for loans
    Route::resource('/loans', 'Admin\LoanController', ['except' => [ 'create' ] ]);

    //routes for purposes
    Route::resource('/purposes', 'Admin\PurposeController');

    //routes for specification
    Route::resource('/specifications', 'Admin\SpecificationController');


    //routes for banks and bank employees
    Route::resource('/banks','Admin\BankController');

    //routes for offers
    Route::resource('/offers','Admin\OfferController');


    //routes for datatables
    Route::get('/all_banks', 'Admin\DataTableController@fetchBanks')->name('datatable.banks');
    Route::get('/all_loans', 'Admin\DataTableController@fetchLoans')->name('datatable.loans');
    Route::get('/all_loan_purposes', 'Admin\DataTableController@fetchPurposes')->name('datatable.purposes');
    Route::get('/all_loan_specifications', 'Admin\DataTableController@fetchSpecifications')->name('datatable.specifications');
    
});
