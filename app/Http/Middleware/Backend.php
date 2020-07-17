<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Backend
{
    /*
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && auth()->user()->role == 1){
            return $next($request);
        }else{
            return redirect()->back()->with('success','Tài khoản không có quyền truy cập');
        }
    }
}
