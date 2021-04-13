<?php

use Illuminate\Support\Facades\Route;

//login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/registerUser','Auth\RegisterController@form_user')->name('form_user');
Route::get('/registerCompany','Auth\RegisterController@form_company')->name('form_company');


Route::get('/index', function () {

    return "on sucsses";
})->name('index');
