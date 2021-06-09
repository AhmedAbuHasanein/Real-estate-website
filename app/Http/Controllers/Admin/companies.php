<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class companies extends Controller
{
    public function  index(){
        $companies = Company::all();
        return view('admin.management_companies','companies');
    }
}
