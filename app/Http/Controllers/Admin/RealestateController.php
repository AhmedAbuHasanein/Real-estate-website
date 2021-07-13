<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realestate;
use Illuminate\Http\Request;

class RealestateController extends Controller
{
    public function  index(){
        $realestates = Realestate::all();
        return view('admin.management_realestates',compact('realestates'));
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $realestate= Realestate::find($id);
        return view('admin.show_realestate',compact('realestate'));
    }



    /**
     * @param $id
     * @return
     */
    public function delete($id){
        Realestate::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف  العقار بنجاح !']);
    }
}
