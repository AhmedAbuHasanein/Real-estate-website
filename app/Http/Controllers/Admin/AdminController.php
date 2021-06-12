<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function  index(){
        $admins = Admin::all();
        return view('admin.management_admins',compact('admins'));
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $admin =Admin::find($id);
        return view('admin.show_admin',compact('admin'));
    }
    /**
     * @param   $request
     * @return
     */
    public function store(Request $request){
       return true;
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
        Admin::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف المشرف بنجاح !']);
    }
}
