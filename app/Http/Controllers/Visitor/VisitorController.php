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
        $query =Realestate::where('realestate_type_id',$id)->paginate(10);
        return view('public.department')->with('type_id',$query);

    }
    //end show of type

    //search engine
    public function search(Request $request){
        $search = $request['search'];
       $result= Realestate::where('description','LIKE', "%{$search}%")->paginate(10);
        return view('public.result')->with('result',$result);

    }
    //end search
//show realestate details
    public function index($id){

        $result = Realestate::join('companies','company_id','companies.id')->where('realestates.id',$id)->first();
        $type = Realestate_type::join('realestates','realestate_types.id','realestates.realestate_type_id')->where('realestates.id',$id)->first();
        if ($result != null) {
            return view('public.product')->with('realestate', $result)->with('type', $type);
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
