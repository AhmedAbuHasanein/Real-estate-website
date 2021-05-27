<?php

use Illuminate\Support\Facades\Route;

//login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@index')->name('register');
Route::post('/register_account','Auth\RegisterController@store')->name('register_account');

Route::middleware('auth')->group(function () {
    //Routes Admin
    Route::prefix('Admin')->middleware("IsAdmin")->group(function () {
        Route::get('/index', function () {
            return "on sucsses admin";
        })->name('admin');
    });
    //Routes Company
    Route::prefix('Company')->middleware("IsCompany")->group(function () {
        Route::get('/index', function () {
            return "on sucsses company";
        })->name('company');
    });
    //Routes User
    Route::prefix('User')->middleware("IsUser")->group(function () {
        Route::get('/index', function () {
            return "on sucsses user";
        })->name('user');
    });
});
//Routes Visitor
Route::prefix('Visitor')->group(function () {
});

Route::get('/index', function () {
  return "xxx";
})->name('index');










