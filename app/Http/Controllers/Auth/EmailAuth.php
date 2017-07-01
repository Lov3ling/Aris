<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailAuth extends Controller
{
    //
    public function index($token)                   /* 接收token验证邮箱*/
    {
        $user=User::where('access_code',$token)->first();
        if($user==null)
        {
            die();
        }
        else
        {
            $user->activate=1;
            $user->access_code=str_random(40);
            $user->save();
            Auth::login($user);
            flash('邮箱验证成')->important();
            return redirect('/home');
        }

    }
}
