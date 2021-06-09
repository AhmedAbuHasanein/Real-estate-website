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
            return view('admin.index');
        })->name('admin_index');
        Route::get('/management_users', 'Admin\users@index')->name('management_users');
        Route::get('/show_user/{id}/profile','Admin\users@show')->name('show_user');
        Route::get('/delete_user/{id}','Admin\users@delete')->name('delete_user');


        Route::get('/management_companies', 'Admin\companies@index')->name('management_companies');


        Route::get('/management_admins', 'Admin\admins@index')->name('management_admins');

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










