<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function  index(){
        $companies = Company::paginate(10);
        return view('admin.management_companies',compact('companies'));
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $company =Company::find($id);
        return view('admin.show_company',compact('company'));
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
            $companies = Company::whereIn('account_id', $accounts_id )->paginate(10);
        }else if($request->search_admin == 'email'){
            $accounts_id = Account::all()->where('email','=',$request->value_search)->pluck('id')->toArray();
            $companies = Company::whereIn('account_id', $accounts_id )->paginate(10);

        }else if($request->search_admin == 'ssid'){
            $companies = Company::where('ssid','=',$request->value_search)->paginate(10);
        }else if($request->search_admin == 'company_name'){
            $companies = Company::where('company_name','=',$request->value_search)->paginate(10);
        }else{
            return redirect()->back();
        }

        return view('admin.management_companies',compact('companies'));
    }
  /**
     * @param $id
     * @return
     */
    public function delete($id){
        Company::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف الشركة بنجاح !']);
    }
}

