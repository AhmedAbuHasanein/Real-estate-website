<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function  index(){
        $companies = Company::all();
        return view('admin.management_companies','companyController');
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $company =Company::find($id);
        return view('admin.show_user',compact('company'));
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
        Company::find($id)->account->delete();
        Company::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف الشركة بنجاح !']);
    }
}

