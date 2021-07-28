<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Http\Request;

class RealestateController extends Controller
{
    //show management realestate
    public function  index(){
        $realestates = Realestate::paginate(10);
        return view('admin.management_realestates',compact('realestates'));
    }
    /**
     * @param $id
     * @return
     */
    //show  realestate
    public function show($id){
        $realestate= Realestate::find($id);
        return view('admin.show_realestate',compact('realestate'));
    }
    /**
     * @param $request
     * @return
     */
    //search in  management realestate
    public function  search(Request $request){
        if($request->search_admin == null || $request->value_search == null ){
            return redirect()->back();
        }

        if($request->search_admin == 'price'){
            $realestates = Realestate::all()->where('price', '=', $request->value_search )->paginate(10);
        }else if($request->search_admin == 'company_name'){
            $companies = Company::all()->where('company_name','=',$request->value_search)->pluck('id')->toArray();
            $realestates = Realestate::whereIn('company_id', $companies)->paginate(10);
        }else if($request->search_admin == 'space'){
            $realestates = Realestate::where('space', '=', $request->value_search )->paginate(10);
        }if($request->search_admin == 'email'){
            $company_id = Account::all()->where('email', '=', $request->value_search )->first->company->id;
            $realestates = Realestate::where('company_id', '=',  $company_id )->paginate(10);
        }else{
            return redirect()->back();
        }

        return view('admin.management_realestates',compact('realestates'));
    }



    /**
     * @param $id
     * @return
     */
    //delete realestate
    public function delete($id){
        $realestate = Realestate::find($id);
        if($realestate == null){

            return redirect()->back();
        }
        $realestate->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف  العقار بنجاح !']);
    }
}
