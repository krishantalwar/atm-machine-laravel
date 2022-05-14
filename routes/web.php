<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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



Route::group(['namespace' => 'Auth', "middleware" => ['guest']], function () {
    Route::get('/', 'LoginController@index')->name('home');
    Route::post('/login', 'LoginController@login')->name('login');
});

Route::group(
    ["middleware" => ['auth']],
    function () {
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/withdaw', 'UserWithdrawsController@index')->name('withdaw');
        Route::post('/amountWithrdaw', 'UserWithdrawsController@amountWithrdaw')->name('amountWithrdaw');
    }
);


Route::group(['namespace' => 'Superadmin\Auth', "middleware" => ['guest'], "prefix" => "admin"], function () {
    Route::get('/', 'LoginController@index')->name('superadmin');
    Route::post('superadminlogin', 'LoginController@login')->name('superadmin.login');
});


Route::group(['namespace' => 'Superadmin', "middleware" => ['auth'], "prefix" => "admin"], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/userlist', 'UsersController@index')->name('userlist');
    Route::get('/notes', 'NotesController@index')->name('notes');
});