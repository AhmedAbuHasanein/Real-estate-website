<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    // show realestate by there type
    public function show($id){
        $query =Realestate::where('realestate_type_id',$id)->Where('status','=', 'متاح')->paginate(8);
        $types=Realestate_type::select()->get();
        return view('public.department')->with(['type_id'=>$query, 'types'=>$types]);

    }
    //end show of type

    //search engine
    public function search(Request $request){
        $search = $request['search'];
        if($search == null){
            return redirect()->back();
        }
        $realestate_type_id = Realestate_type::where('type', 'LIKE', "%{$search}%")->pluck('id')->toArray() ;
        if($realestate_type_id == null){
            $realestate_type_id = [];
        }
       $result= Realestate::where('description','LIKE', "%{$search}%")
           ->orWhere('address','LIKE', "%{$search}%")
           ->orWhereIn('realestate_type_id' , $realestate_type_id)
           ->orWhere('price','=', $search)
           ->orWhere('space','=', $search)
           ->orWhere('type','=', $search)->Where('status','=', 'متاح')-> paginate(8);
        $types=Realestate_type::select()->get();
        return view('public.result')->with(['result'=>$result, 'search'=>$search, 'types'=>$types]);

    }
    //end search
//show realestate details
    public function index($id){
        $types=Realestate_type::select()->get();
        $result = Realestate::join('companies','company_id','companies.id')->where('realestates.id',$id)->first();
        $type = Realestate_type::join('realestates','realestate_types.id','realestates.realestate_type_id')->where('realestates.id',$id)->first();
        if ($result != null) {
            return view('public.product')->with('realestate', $result)->with(['type'=> $type, 'types'=>$types]);
        }else{
            return view('error-404');
        }

    }
    //end realestate shows


    //show types in the home page
    public function home(){
        $types=Realestate_type::select()->get();

        return view('public.home')->with('types',$types);
    }
    //show types in the home page
}
