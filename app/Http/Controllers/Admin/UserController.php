<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

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
     * @param $request
     * @return
     */
    public function  search(Request $request){
        if($request->search_admin == null || $request->value_search == null ){
            return redirect()->back();
        }

        if($request->search_admin == 'user_name'){
            $accounts_id = Account::all()->where('user_name','=',$request->value_search)->pluck('id')->toArray();
            $users = User::whereIn('account_id', $accounts_id )->paginate(10);
        }else if($request->search_admin == 'email'){
            $accounts_id = Account::all()->where('email','=',$request->value_search)->pluck('id')->toArray();
            $users = User::whereIn('account_id', $accounts_id )->paginate(10);

        }else{
            return redirect()->back();
        }

        return view('admin.management_users',compact('users'));
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
