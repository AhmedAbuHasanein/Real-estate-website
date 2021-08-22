<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // index  in user
    public function  index(){
        $types =Realestate_type::all();
        $user_id =auth()->user()->user->id;
        $companies_id = Follower::all()->where('user_id','=',$user_id)->pluck('company_id')->toArray() ;
        $realestates = Realestate::all()->whereIn('company_id',$companies_id);

        return view('user.map',compact('realestates','types'));
    }
    // search in user

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function  searchUser(Request $request){
        $search = $request['search'];

        $realestate_type_id = Realestate_type::where('type', 'LIKE', "%{$search}%")->pluck('id')->toArray() ;
        if($realestate_type_id == null){
            $realestate_type_id = [];
        }
        $realestates= Realestate::where('description','LIKE', "%{$search}%")
            ->orWhere('address','LIKE', "%{$search}%")
            ->orWhereIn('realestate_type_id' , $realestate_type_id)
            ->orWhere('price','=', $search)
            ->orWhere('space','=', $search)
            ->orWhere('type','=', $search)->Where('status','=', 'متاح')->get();
        $types=Realestate_type::select()->get();

        return view('user.map')->with(['realestates'=>$realestates, 'search'=>$search, 'types'=>$types]);
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // show realestate by there type
    public function show($id){
        $realestates =Realestate::where('realestate_type_id',$id)->Where('status','=', 'متاح')->get();
        $types=Realestate_type::select()->get();
        return view('user.map')->with(['realestates'=> $realestates, 'types'=>$types]);

    }
}
