<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Realestate_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealestateController extends Controller
{

    /**
     * @param $id
     * @return
     */
    //show  realestate
    public function show($id){
        $realestate = Auth::user()->company->realestates->find($id);
        $realestate_types = Realestate_type::all();
       if($realestate == null){

           return redirect()->back();
       }
           return view('company.show_realestate', compact(['realestate','realestate_types']));


     }

    /**
     * @param   $request
     * @return
     */
    //store  realestate
    public function store(Request $request){
    }

    /**
     * @param   $request
     * @return
     */
    //update realestate
    public function update(Request $request){

    }

    /**
     * @param $id
     * @return
     */
    //delete realestate
    public function delete($id){
        $realestate = Auth::user()->company->realestates->find($id);

        if($realestate == null){
            return redirect()->back();
        }else {
            $realestate->delete();
            return redirect()->back()->with(['success' => 'تمت عملية حذف  العقار بنجاح !']);
        }
    }
}
