<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    //     // Auth::check() && Auth::users()->role == 1
        if(Auth::check() && auth()->user()->role == 1){
                return $next($request);
       }else{
            return redirect()->back()->with('success','Tài khoản hoặc mật khẩu không đúng');
       }
    }
}
