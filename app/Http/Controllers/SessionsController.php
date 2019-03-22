<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
         $this->middleware('guest', [
            'only' => ['create']
         ]);
    }
    //显示登录页面
    public function create()
    {
        return view('sessions.create');
    }

    //保存登录信息
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials, $request->has('remember')))
        {
            if(Auth::user()->activated){
                //登录成功后
                session()->flash('success', 'Welcome back!');
                $fallback = route('users.show', Auth::user());

                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warning', 'Go check your email and activate your account');

                return redirect('/');
            }

        } else {
            //登录失败后
            session()->flash('danger', 'Sorry,email or password is invaild');
            return redirect()->back()->withInput();
        }

        return;
    }

    //退出登录
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'You\'ve logged out');
        return redirect('login');
    }
}
