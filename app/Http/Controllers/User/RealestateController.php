<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Http\Request;

class RealestateController extends Controller
{
    /**
     * @param $id
     */
   public function show($id){
       $types=Realestate_type::select()->get();
      $realestate = Realestate::all()->find($id);

      if($realestate == null){
         return redirect()->back();
      }else{
          return view('user.showrealestate')->with(['types'=>$types, 'realestate'=>$realestate]);
      }

   }
}
