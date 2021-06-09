<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function  index(){
        $users = User::all();
        return view('admin.management_users',compact('users'));
    }

    /**
     * @param $id
     */
    public function show($id){
        $user =user::find($id);
        return $user;
    }

    /**
     * @param $id
     */
    public function delete($id){
        user::find($id)->delete();
        return redirect()->back()->with(['success'=>'User  has been successfully deleted!']);
    }
}
