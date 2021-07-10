<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function  index(){
        $grade =auth()->user()->admin->grade;
        $admins = Admin::all()->where('grade','>',$grade)->sortby('grade');
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
        $grade = Auth::user()->admin->grade;
        $rules =[
            'email' => 'required|email|unique:accounts|max:255',
            'user_name' => 'required|string|unique:accounts|max:150',
            'password' => 'required|string|max:150',
            'grade'=> 'required:number:max:'.$grade,
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
            $admin->grade = $request->grade;
            if($request->add_admin != null && $request->add_admin == "true"){
                $admin->add_admin = true;
            }
            if($request->update_admin != null && $request->update_admin == "true"){
                $admin->update_admin = true;
            }
            if($request->show_admin != null && $request->show_admin == "true"){
                $admin->show_admin = true;
            }
            if($request->delete_admin != null && $request->delete_admin == "true"){
                $admin->delete_admin = true;
            }
            if($request->add_realestate_type != null && $request->add_realestate_type == "true"){
                $admin->add_realestate_type = true;
            }
        if($request->update_realestate_type != null && $request->update_realestate_type == "true"){
            $admin->update_realestate_type = true;
        }
        if($request->show_realestate_type != null && $request->show_realestate_type == "true"){
            $admin->show_realestate_type = true;
        }
        if($request->delete_realestate_type != null && $request->delete_realestate_type == "true"){
            $admin->delete_realestate_type = true;
        }
        if($request->show_realestate != null && $request->show_realestate == "true"){
            $admin->show_realestate = true;
        }
        if($request->delete_realestate != null && $request->delete_realestate == "true"){
            $admin->delete_realestate = true;
        }
        if($request->show_user != null && $request->show_user == "true"){
            $admin->show_user = true;
        }
        if($request->delete_user != null && $request->delete_user == "true"){
            $admin->delete_user = true;
        }
        if($request->show_company != null && $request->show_company == "true"){
            $admin->show_company = true;
        }
        if($request->delete_company != null && $request->delete_company == "true"){
            $admin->delete_company = true;
        }


            $admin->save();
       return redirect()->back()->with(['success'=>'تمت عملية إضافة المشرف بنجاح !']);
    }
    /**
     * @param   $request
     * @return
     */
    public function update(Request $request){
        $admin = Admin::all()->find($request->id);
        $admin->grade = $request->grade;
        if($request->add_admin != null && $request->add_admin == "true"){
            $admin->add_admin = true;
        }else{
            $admin->add_admin = false;
        }
        if($request->update_admin != null && $request->update_admin == "true"){
            $admin->update_admin = true;
        }else{
            $admin->update_admin = false;
        }
        if($request->show_admin != null && $request->show_admin == "true"){
            $admin->show_admin = true;
        }else{
            $admin->show_admin = false;
        }
        if($request->delete_admin != null && $request->delete_admin == "true"){
            $admin->delete_admin = true;
        }else{
            $admin->delete_admin = false;
        }
        if($request->add_realestate_type != null && $request->add_realestate_type == "true"){
            $admin->add_realestate_type = true;
        }else{
            $admin->add_realestate_type = false;
        }
        if($request->update_realestate_type != null && $request->update_realestate_type == "true"){
            $admin->update_realestate_type = true;
        }else{
            $admin->update_realestate_type = false;
        }
        if($request->show_realestate_type != null && $request->show_realestate_type == "true"){
            $admin->show_realestate_type = true;
        }else{
            $admin->show_realestate_type = false;
        }
        if($request->delete_realestate_type != null && $request->delete_realestate_type == "true"){
            $admin->delete_realestate_type = true;
        }else{
            $admin->delete_realestate_type = false;
        }
        if($request->show_realestate != null && $request->show_realestate == "true"){
            $admin->show_realestate = true;
        }else{
            $admin->show_realestate = false;
        }
        if($request->delete_realestate != null && $request->delete_realestate == "true"){
            $admin->delete_realestate = true;
        }else{
            $admin->delete_realestate = false;
        }
        if($request->show_user != null && $request->show_user == "true"){
            $admin->show_user = true;
        }else{
            $admin->show_user = false;
        }
        if($request->delete_user != null && $request->delete_user == "true"){
            $admin->delete_user = true;
        }else{
            $admin->delete_user = false;
        }
        if($request->show_company != null && $request->show_company == "true"){
            $admin->show_company = true;
        }else{
            $admin->show_company = false;
        }
        if($request->delete_company != null && $request->delete_company == "true"){
            $admin->delete_company = true;
        }else{
            $admin->delete_company = false;
        }


        $admin->save();
        return redirect()->back()->with(['success'=>'تمت عملية تعديل المشرف بنجاح !']);
    }
    public  function profile(){
            $admin = Auth::user();
            return redirect()->route('admin_management_admins');
    }
    /**
     * @param $id
     * @return
     */
    public function delete($id){
        Admin::find($id)->delete();
        return redirect()->back()->with(['success' => 'تمت عملية حذف المشرف بنجاح !']);
    }
}
