<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function form_register(){
        return view('auth.register');
    }
    public function form_user(){
        return view('auth.registerUser');
    }
    public function form_company(){
        return view('auth.registerCompany');
    }
    public function create_user(){

    }
    public function create_company(){

    }
}
