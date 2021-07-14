<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    public function  index(){
        $users = User::paginate(10);
        return view('admin.management_users',compact('users'));
    }

    /**
     * @param $id
     * @return
     */
    public function show($id){
        $user =user::find($id);
        return view('admin.show_user',compact('user'));
    }
    /**
     * @param   $request
     * @return
     */
    public function update(Request $request){
        return true;
    }
    /**
     * @param $id
     * @return
     */
    public function delete($id){
        user::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف الزبون بنجاح']);
    }
}
