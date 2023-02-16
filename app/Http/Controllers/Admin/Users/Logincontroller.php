<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('admin.users.login',['title' => 'đăng nhập hệ thống']);
    }
    public function store(Request $request)
    {
        $this -> validate($request,[
         'email' => 'required|email:filter',
          'password' =>'required'
            ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password'
        ]);
        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ], $request -> input('remember'))){
            return redirect()->route('admin');
        }
           return redirect()->back();

    }
}
