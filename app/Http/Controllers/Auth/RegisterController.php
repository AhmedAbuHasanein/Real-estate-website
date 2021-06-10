<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Company;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register_form');
    }
    /**
     * @param   $request
     * @return
     */
   public function store(Request $request){

       $rules =[
           'account_type' => 'required',
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
       if($request->exists('company_name')&& $request->exists('ssid')){
           $rules['company_name']= 'required|string|max:255';
           $rules['ssid']=  'required|unique:companyController';
       }
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

       if($request->account_type =="company"){
           $company = new Company();
           $company->account_id = $account->id;
           $company->company_name = $request->company_name;
           $company->ssid = $request->ssid;
           $company->score = 50;
           $company->save();
       }else{
         $user = new User();
          $user->account_id = $account->id;
         $user->save();
       }
        return redirect()->route('login');
   }
}
