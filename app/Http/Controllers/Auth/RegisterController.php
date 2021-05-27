<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register_form');
    }
    /**
     * @param   $request
     * @return
     */
   public function store(Request $request){

        return $request->toArray();
   }
}
