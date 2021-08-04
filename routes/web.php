<?php

use Illuminate\Support\Facades\Route;

//login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@index')->name('register');
Route::post('/register_account','Auth\RegisterController@store')->name('register_account');
Route::get('/login/remember_token','Auth\LoginController@login_remember_token')->name('login_remember_token');

Route::middleware('auth')->group(function () {
    //Routes Admin
    Route::prefix('Admin')->middleware("IsAdmin")->group(function () {
        //routes pages  profile
        Route::get('/', 'Admin\ProfileController@index')->name('admin_index');
        Route::get('/myProfile', 'Admin\ProfileController@index')->name('admin_myProfile');
        Route::post('/myProfile/update', 'Admin\ProfileController@update')->name('admin_update_profile');
       // routes pages users
        Route::get('/management_users', 'Admin\UserController@index')->name('admin_management_users');
        Route::get('/show_user/{id}/profile','Admin\UserController@show')->middleware("IsShowUser")->name('admin_show_user');
        Route::get('/delete_user/{id}','Admin\UserController@delete')->middleware("IsDeleteUser")->name('admin_delete_user');
        Route::get('/management_users/search/','Admin\UserController@search')->name('admin_search_user');

        //routes pages companies
        Route::get('/management_companies', 'Admin\CompanyController@index')->name('admin_management_companies');
        Route::get('/show_company/{id}/profile','Admin\CompanyController@show')->middleware("IsShowCompany")->name('admin_show_company');
        Route::get('/delete_company/{id}','Admin\CompanyController@delete')->middleware("IsDeleteCompany")->name('admin_delete_company');
        Route::get('/management_companies/search/','Admin\CompanyController@search')->name('admin_search_company');
        // routes pages admins
        Route::get('/management_admins', 'Admin\AdminController@index')->name('admin_management_admins');
        Route::get('/add_admin/',function (){
            return view('admin.add_admin');
        })->middleware('IsAddAdmin')->name('admin_add_admin_form');
        Route::post('/add_admin','Admin\AdminController@store')->middleware('IsAddAdmin')->name('admin_add_admin');
        Route::post('/update_admin','Admin\AdminController@update')->middleware("IsUpdateAdmin")->name('admin_update_admin');
        Route::get('/show_admin/{id}/profile','Admin\AdminController@show')->middleware("IsShowAdmin")->name('admin_show_admin');
        Route::get('/delete_admin/{id}','Admin\AdminController@delete')->middleware("IsDeleteAdmin")->name('admin_delete_admin');
        Route::get('/management_admins/search/','Admin\AdminController@search')->name('admin_search_admin');

        // routes pages realestates_type
        Route::get('/management_realestate_type', 'Admin\RealestateTypeController@index')->name('admin_management_realestate_types');
        Route::get('/add_realestate_type',function (){
            return view('admin.add_realestate_type');
        })->middleware("IsAddRealestateType")->name('admin_add_realestate_type_form');
        Route::post('/add_realestate_type','Admin\RealestateTypeController@store')->middleware("IsAddRealestateType")->name('admin_add_realestate_type');
        Route::post('/update_realestate_type','Admin\RealestateTypeController@update')->middleware("IsUpdateRealestateType")->name('admin_update_realestate_type');
        Route::get('/show_realestate_type/{id}','Admin\RealestateTypeController@show')->middleware("IsShowRealestateType")->name('admin_show_realestate_type');
        Route::get('/delete_realestate_type/{id}','Admin\RealestateTypeController@delete')->middleware("IsDeleteRealestateType")->name('admin_delete_realestate_type');
        Route::get('/management_realestate_type/search/','Admin\RealestateTypeController@search')->name('admin_search_realestate_type');

        // routes pages realestates
        Route::get('/management_realestate', 'Admin\RealestateController@index')->name('admin_management_realestates');
        Route::get('/show_realestate/{id}','Admin\RealestateController@show')->middleware("IsShowRealestate")->name('admin_show_realestate');
        Route::get('/delete_realestate/{id}','Admin\RealestateController@delete')->middleware("IsDeleteRealestate")->name('admin_delete_realestate');
        Route::get('/management_realestate/search/','Admin\RealestateController@search')->name('admin_search_realestate');

    });
    //Routes Company
    Route::prefix('Company')->middleware("IsCompany")->group(function () {
        //routes pages  profile
        Route::get('/', 'Company\ProfileController@index')->name('company_index');
        Route::get('/myProfile', 'Company\ProfileController@index')->name('company_myProfile');
        Route::post('/myProfile/update', 'Company\ProfileController@update')->name('company_update_profile');
         // routes pages realestates
        Route::get('/add_realestate/', function (){
            return view('company.add_realestate');
        })->name('company_add_realestate_form');
        Route::post('/add_realestate', 'Company\RealestateController@store')->name('company_add_realestate');
        Route::get('/show_realestate/{id}','Company\RealestateController@show')->name('company_show_realestate');
        Route::get('/update_realestate','Company\RealestateController@update')->name('company_update_realestate');
        Route::get('/delete_realestate/{id}','Company\RealestateController@delete')->name('company_delete_realestate');
        Route::get('/delete_document_company/{id}','Company\DocumentCompanyController@delete')->name('company_delete_document_company');

    });
    //Routes User
    Route::prefix('User')->middleware("IsUser")->group(function () {
        Route::get('/index', function () {
            return "on sucsses user";
        })->name('user_index');
    });
});
//Routes Visitor
Route::prefix('Visitor')->group(function () {

});
Route::get('test',function (){
    return view('test');
});








