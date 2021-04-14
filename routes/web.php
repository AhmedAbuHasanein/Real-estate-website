<?php

use App\Models\Account;
use Illuminate\Support\Facades\Route;

//login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/registerUser','Auth\RegisterController@form_user')->name('form_user');
Route::get('/registerCompany','Auth\RegisterController@form_company')->name('form_company');

Route::middleware('auth')->group(function () {
    //Routes Admin
    Route::prefix('Admin')->middleware("IsAdmin")->group(function () {
    });
    //Routes Company
    Route::prefix('Company')->middleware("IsCompany")->group(function () {
    });
    //Routes User
    Route::prefix('User')->middleware("IsUser")->group(function () {
    });
});
//Routes Visitor
Route::prefix('Visitor')->group(function () {
});










Route::get('/index', function () {

    return "on sucsses";
})->name('index');



