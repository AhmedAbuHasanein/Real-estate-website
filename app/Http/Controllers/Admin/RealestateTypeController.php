<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Realestate_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RealestateTypeController extends Controller
{
    //show management realestate type
    public function  index(){
        $realestate_types = Realestate_type::paginate(10);
        return view('admin.management_realestate_types',compact('realestate_types'));
    }
    /**
     * @param $id
     * @return
     */
    //show  realestate type
    public function show($id){
        $realestate_type= Realestate_type::find($id);
        return view('admin.show_realestate_type',compact('realestate_type'));
    }
    /**
     * @param $request
     * @return
     */
    //search in management realestate type
    public function  search(Request $request){
        if($request->search_admin == null || $request->value_search == null ){
            return redirect()->back();
        }

        if($request->search_admin == 'type'){
            $realestate_types = Realestate_type::where('type', '=', $request->value_search)->paginate(10);
        }else if($request->search_admin == 'email'){
            $accounts_id = Account::all()->where('email','=',$request->value_search)->pluck('id')->toArray();
            $admins = Admin::whereIn('account_id', $accounts_id )->pluck('id')->toArray();
            $realestate_types = Realestate_type::whereIn('admin_id', $admins)->paginate(10);
        }else{
            return redirect()->back();
        }

        return view('admin.management_realestate_types',compact('realestate_types'));
    }
    /**
     * @param   $request
     * @return
     */
    //store  realestate type
    public function store(Request $request){
        $rules =[
            'type' => 'required|string|unique:realestate_types',
            'emoji' => 'required|mimes:jpeg,jpg,png,gif',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }


        $realestate_type = new Realestate_type();
        $realestate_type->type = $request->type;
        $file =$request->file('emoji');
        $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
        $request->file('emoji')->move('asset/emoji_realestate_type', $filename);
        $realestate_type->emoji = 'asset/emoji_realestate_type/'. $filename;
        $account = Auth::user();
        $realestate_type->admin_id = $account->admin->id ;
        $realestate_type->save();
        return redirect()->route('admin_management_realestate_types')->with(['success'=>'تمت عملية إضافة نوع العقار بنجاح !']);
    }

    /**
     * @param   $request
     * @return
     */
    //update realestate type
    public function update(Request $request){
        $rules =[
            'type' => 'required|string',
            'emoji' => 'mimes:jpeg,jpg,png,gif',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }


        $realestate_type = Realestate_type::find($request->id);
        $realestate_type_request = Realestate_type::all()->where('type','=',$request->type)->first();
        if($realestate_type_request != null && $realestate_type_request->id != $realestate_type->id  ){
           return redirect()->back()->withInput()->with(['error'=> 'نوع العقار موجود مسبقا!']);
        }
        $realestate_type->type = $request->type;
        if($request->file('emoji')!=null){
            $file =$request->file('emoji');
            $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
            $request->file('emoji')->move('asset/emoji_realestate_type', $filename);
            $realestate_type->emoji = 'asset/emoji_realestate_type/'. $filename;
        }

        $account = Auth::user();
        $realestate_type->admin_id = $account->admin->id ;
        $realestate_type->save();
        return redirect()->route('admin_management_realestate_types')->with(['success'=>'تمت عملية تعديل نوع العقار بنجاح !']);
    }

    /**
     * @param $id
     * @return
     */
    //delete realestate type
    public function delete($id){
        Realestate_type::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف نوع العقار بنجاح !']);
    }
}
