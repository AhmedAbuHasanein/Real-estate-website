<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Image_Realestate;
use App\Models\Realestate;
use App\Models\Realestate_type;
use App\Models\RealEstateDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
//update   realestate form
    public function update_form($id){
        $realestate = Auth::user()->company->realestates->find($id);
        $realestate_types = Realestate_type::all();
        if($realestate == null){

            return redirect()->back();
        }
        return view('company.update_realestate', compact(['realestate','realestate_types']));


    }

    /**
     * @param   $request
     * @return
     */
    //store  realestate
    public function store(Request $request){
        $rules =[
            'description' => 'required',
            'status' => 'required',
            'type' => 'required',
            'space' => 'required|int',
            'price' => 'required|int',
            'location' => 'required',
            'address' => 'required',
            'realestate_type' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'video_url' => 'required|mimes:mp4',
            'realestate_image.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'realestate_documents.*' => 'mimes:jpeg,jpg,png,gif|max:10000',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $realestate = new Realestate();
        $realestate->description= $request->description;
        $realestate->space = $request->space;
        $realestate->price = $request->price;
        if($request->status == "متاح"){
            $realestate->status = "متاح";
        }else{
            $realestate->status = "غير متاح";
        }
        if( $request->type == "بيع"){
            $realestate->type  = "بيع";
        }else{
            $realestate->type  = "إيجار";
        }
        $realestate->location = $request->location;
        $realestate->address = $request->address;
        $realestate_type = Realestate_type::all()->where('type','=',$request->realestate_type)->first();
        if( $realestate_type != null){
            $realestate->realestate_type_id = $realestate_type->id;
        }
        if($request->file('main_image')!=null){
            $file =$request->file('main_image');
            $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
            $request->file('main_image')->move('asset/realestate_images', $filename);
            $realestate->main_image = 'asset/realestate_images/'. $filename;
            }
        if($request->file('video_url')!=null){
            $file =$request->file('video_url');
            $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
            $request->file('video_url')->move('asset/video_realestates', $filename);
            $realestate->video_url = 'asset/video_realestates/'. $filename;
        }

        $realestate->company_id = Auth::user()->company->id;
            $realestate->save();

        if ($request->realestate_images != null) {
            foreach ($request->file('realestate_images') as $file){
                $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                $file->move('asset/realestate_images', $filename);
                $realestate_image =new Image_Realestate();
                $realestate_image->url = "asset/realestate_images/" . $filename;

                $realestate_image->realestate_id =  $realestate->id;
                $realestate_image->save();
            }
        }
        if ($request->realestate_documents != null) {
            foreach ($request->file('realestate_documents') as $file){
                $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                $file->move('asset/realestate_documents', $filename);
                $realestate_document =new RealEstateDocuments();
                $realestate_document->url = "asset/realestate_documents/" . $filename;
                $realestate_document->realestate_id =  $realestate->id;
                $realestate_document->save();
            }
        }

        return redirect()->route('company_show_realestate',['id'=>$realestate->id])->with(['success'=>'تمت عملية إضافة العقار بنجاح !']);
    }


    /**
     * @param   $request
     * @return
     */
    //update realestate
    public function update(Request $request){
        $rules =[
            'description' => 'required',
            'status' => 'required',
            'type' => 'required',
            'space' => 'required|int',
            'price' => 'required|int',
            'location' => 'required',
            'address' => 'required',
            'realestate_type' => 'required',
            'main_image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'video_url' => 'mimes:mp4',
            'realestate_image.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'realestate_documents.*' => 'mimes:jpeg,jpg,png,gif|max:10000',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $realestate = Auth::user()->company->realestates->find($request->id);

        if( $realestate!= null){
            $realestate->description= $request->description;
            $realestate->space = $request->space;
            $realestate->price = $request->price;
            if($request->status == "متاح"){
                $realestate->status = "متاح";
            }else{
                $realestate->status = "غير متاح";
            }
            if( $request->type == "بيع"){
                $realestate->type  = "بيع";
            }else{
                $realestate->type  = "إيجار";
            }
            $realestate->location = $request->location;
            $realestate->address = $request->address;
            $realestate_type = Realestate_type::all()->where('type','=',$request->realestate_type)->first();
            if( $realestate_type != null){
                $realestate->realestate_type_id = $realestate_type->id;

            }

            if($request->file('main_image')!=null){

                $file =$request->file('main_image');
                $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                $request->file('main_image')->move('asset/realestate_images', $filename);
                $realestate->main_image = 'asset/realestate_images/'. $filename;
            }
            if($request->file('video_url')!=null){

                $file =$request->file('video_url');
                $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                $request->file('video_url')->move('asset/video_realestates', $filename);
                $realestate->video_url = 'asset/video_realestates/'. $filename;
            }

            $realestate->save();
            if ($request->realestate_images != null) {
                foreach ($request->file('realestate_images') as $file){
                    $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                    $file->move('asset/realestate_images', $filename);
                    $realestate_image =new Image_Realestate();
                    $realestate_image->url = "asset/realestate_images/" . $filename;

                    $realestate_image->realestate_id =  $realestate->id;
                    $realestate_image->save();
                }
            }
            if ($request->realestate_documents != null) {
                foreach ($request->file('realestate_documents') as $file){
                    $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
                    $file->move('asset/realestate_documents', $filename);
                    $realestate_document =new RealEstateDocuments();
                    $realestate_document->url = "asset/realestate_documents/" . $filename;
                    $realestate_document->realestate_id =  $realestate->id;
                    $realestate_document->save();
                }
            }

            return redirect()->route('company_show_realestate',['id'=>$realestate->id])->with(['success'=>'تمت عملية تحديث العقار بنجاح !']);
        }


        return redirect()->back();
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
