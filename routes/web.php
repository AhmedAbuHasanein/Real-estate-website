<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('auth.login');
});
Route::get('/index', function () {

    return "on sucsses";
})->name('index')->middleware('auth');
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
