<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realestate_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RealestateTypeController extends Controller
{
    public function  index(){
        $realestate_types = Realestate_type::all();
        return view('admin.management_realestate_types',compact('realestate_types'));
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $realestate_type= Realestate_type::find($id);
        return view('admin.show_realestate_type',compact('realestate_type'));
    }
    /**
     * @param   $request
     * @return
     */
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
    public function update(Request $request){
        return true;
    }

    /**
     * @param $id
     * @return
     */
    public function delete($id){
        Realestate_type::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف نوع العقار بنجاح !']);
    }
}
