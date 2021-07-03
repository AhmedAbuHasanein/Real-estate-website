<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUpdateAdmin
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
        if(!(Auth::user()->admin->update_admin)){
            return redirect()->back()->with('error','لا تمتلك الصلاحية تعديل مشرف');
        }
        return $next($request);
    }
}
