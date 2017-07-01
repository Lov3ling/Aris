<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class UserAuth
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
        if(Auth::user()->activate===1) {
            return $next($request);
        }
        else{
            return redirect('/')->with(['msg'=>"请完成邮箱认证再进行操作"]);
        }
    }
}
