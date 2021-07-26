<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public  function  login(){
        if (Auth::check()){

            Auth::logout();
        }
        return view('auth.login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // auth  function
    public function authenticate(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember_me') ? true : false;
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        if(auth()->attempt(array($fieldType => $request->username, 'password' => $request->password), $remember_me))
        {

            $user = Auth::guard('web')->user();

                if( Admin::all()->where('account_id','=',auth::user()->id)->isNotEmpty()){
                    $user->status = "نشط";
                    $user->save();
                   // Cookie::queue('remember_token', $user->remember_token , 5);
                    return redirect()->route('admin_index');
                }elseif (Company::all()->where('account_id','=',auth::user()->id)->isNotEmpty()){
                    $user->status = "نشط";
                    $user->save();
                    return redirect()->route('company_index');
                }elseif(User::all()->where('account_id','=',auth::user()->id)->isNotEmpty()){
                    $user->status = "نشط";
                    $user->save();
                    return redirect()->route('user_index');
                }

            Auth::logout();
            return redirect()->back()->with('error','تم حذف هذا الحساب من قبل إدارة الموقع !');
        }
        return redirect()->back()->withInput()->with('error','البريد الالكنروني أو كلمة السر غير صحيحة');
    }
    public  function  logout(){
        if (Auth::check()){
            $user = Auth::user();
            $user->status = "غير نشط";
            $user->save();
            Auth::logout();
        }
        return redirect()->route('login');
    }
    public function login_remember_token(){
        if (Cookie::has('remember_token')) {
            $token = Cookie::get('remember_token');
            $account =Account::all()->where('remember_token', '=', $token)->first();
            if ($account != null) {
                Auth::guard('web')->login($account);
                $user = Auth::guard('web')->user();
                if (Admin::all()->where('account_id', '=', auth::user()->id)->isNotEmpty()) {
                    $user->status = "نشط";
                    $user->save();
                    return redirect()->route('admin_index');
                } elseif (Company::all()->where('account_id', '=', auth::user()->id)->isNotEmpty()) {
                    $user->status = "نشط";
                    $user->save();
                    return redirect()->route('company_index');
                } elseif (User::all()->where('account_id', '=', auth::user()->id)->isNotEmpty()) {
                    $user->status = "نشط";
                    $user->save();
                    return redirect()->route('user_index');
                }

                Auth::logout();
            }
        }
        return redirect()->route('login');

    }

}
