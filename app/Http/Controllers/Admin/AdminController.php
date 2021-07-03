<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function  index(){
        $grade =auth()->user()->admin->grade;
        $admins = Admin::all()->where('grade','>',$grade);
        return view('admin.management_admins',compact('admins'));
    }
    /**
     * @param $id
     * @return
     */
    public function show($id){
        $admin =Admin::find($id);
        return view('admin.show_admin',compact('admin'));
    }
    /**
     * @param   $request
     * @return
     */
    public function store(Request $request){
        $rules =[
            'email' => 'required|email|unique:accounts|max:255',
            'user_name' => 'required|string|unique:accounts|max:150',
            'password' => 'required|string|max:150',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'gender' => 'required',
            'country' => 'required',
            'dob' => 'required|date',
            'address_1' => 'required|string|max:255',
            'phone_number' => 'required|unique:profiles',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $account = new Account();
        $account->email = $request->email;
        $account->user_name = $request->user_name;
        $account->password = Hash::make($request->password);
        $account->save();
        $profile = new profile();
        $profile->account_id = $account->id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->dob = $request->dob;
        $profile->phone_number = $request->phone_number;
        $profile->gender = $request->gender;
        $profile->country = $request->country;
        $profile->address_1 = $request->address_1;
        if($request->address_2 != null){
            $profile->address_2 = $request->address_2;
        }
        if ($request->gender=="ذكر"){
            $profile->profile_image = 'asset/image_profile_users/male.jpg';
        }else{
            $profile->profile_image = 'asset/image_profile_users/female.jpg';
        }
        $profile->save();

            $admin = new Admin();
            $admin->account_id = $account->id;
            $admin->save();
       return redirect()->back()->with(['success'=>'تمت عملية إضافة المشرف بنجاح !']);
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
        $grade = auth()->user()->admin->grade;
       if(Admin::find($id)->where('grade','>', $grade)){
           Admin::find($id)->delete();
           return redirect()->back()->with(['success'=>'تمت عملية حذف المشرف بنجاح !']);
       }
        return redirect()->back()->with(['error'=>'لا تمتلك صلاحية لحذف هذا مشرف  !']);
    }
}
