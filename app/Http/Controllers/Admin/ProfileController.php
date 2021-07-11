<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public  function index(){
        $account = Auth::user();
        $admin = $account->admin;
        return view('admin.profile',compact('admin'));
    }

    /**
     * @param   $request
     * @return
     */
    public function update(Request $request){
        $rules =[
            'email' => 'required|email',
            'user_name' => 'required|string',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'gender' => 'required',
            'country' => 'required',
            'dob' => 'required|date',
            'address_1' => 'required|string|max:255',
            'phone_number' => 'required',
            'old_password' => 'required',
        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        if(Hash::make($request->old_password) != Auth::user()->password){
            dd(Hash::make($request->old_password).'/////'. Auth::user()->password);
            return redirect()->back()->with(['error'=>'كلمة المرور خطأ.']);
        }
        $account = Auth::user();
        if(Account::all()->where('email','=',$request->email) == null){
            $account->email = $request->email;
        }elseif (Account::all()->where('email','=',$request->email)->id != $account->id){
            return redirect()->back()->with(['error'=>'البريد الإلكتروني مستخدم مسبقا!.']);
        }
        if(Account::all()->where('user_name','=',$request->user_name) == null){
            $account->user_name = $request->user_name;
        }elseif (Account::all()->where('user_name','=',$request->user_name)->id != $account->id){
            return redirect()->back()->with(['error'=>'اسم المستخدم مستخدم مسبقا!']);
        }

        if($request->password !=null){
            $account->password = Hash::make($request->password);
        }

        $account->save();
        $profile = $account->profile;
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
        if($request->file('profile_image')!=null){
            $file =$request->file('profile_image');
            $filename = $file->getClientOriginalName().time(). '.' . $file->extension();
            $request->file('profile_image')->move('asset/image_profile_users', $filename);
            $profile->profile_image = 'asset/image_profile_users/'. $filename;
        }

        $profile->save();

        return redirect()->back()->with(['success'=>'تمت عملية تحديث الصفحة الشخصية بنجاح !']);
    }
}
