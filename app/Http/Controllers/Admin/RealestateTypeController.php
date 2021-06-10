<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realestate_type;
use Illuminate\Http\Request;

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
        return view('admin.show_ realestate_type',compact('realestate_type'));
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
        Realestate_type::find($id)->delete();
        return redirect()->back()->with(['success'=>'تمت عملية حذف نوع العقار بنجاح !']);
    }
}
