<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
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

        if(Auth::attempt($credentials))
        {
            //登录成功后
            session()->flash('success', 'Welcome back!');
            return redirect()->route('users.show', [Auth::user()]);

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

    }
}
