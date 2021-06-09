<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User as user;
use Illuminate\Http\Request;

class admins extends Controller
{
    public function  index(){
        $admins = Admin::all();
        return view('admin.management_admins','admins');
    }
}
