<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password ,'level' => 1];
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }

        if(Auth::attempt($arr,$remember)){
            return redirect()->intended('admin/home');
        }else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
        }

    }
}


