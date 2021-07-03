<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ISAddRealestateType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!(Auth::user()->admin->add_realestate_type)){
            return redirect()->back()->with('error','لا تمتلك الصلاحية لاضافة نوع العقار');
        }
        return $next($request);
    }
}
