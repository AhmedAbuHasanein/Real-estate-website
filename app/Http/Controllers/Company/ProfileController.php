<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //show profile admin
    public  function index(){
        $account = Auth::user();
        $company = $account->company;
        return view('company.profile',compact('company'));
    }
    /**
     * @param   $request
     * @return
     */
    //update profile
    public function update(Request $request){

    }

}

