<?php

namespace App\Http\Controllers;

use App\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function index()
    {
        $admin = login::first();

        return view('admin.login',['login'=>$admin]);
    }

    public function getdata(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $admin = login::where([['username',$username],['password',$password]])->count();
        if ($admin == '1') 
        { 
            session(['username-admin'=> $request->username]);
            return redirect('/admin/home')->with("alert",1);
        }
        else
        {
            
            return redirect('/admin/login')->with("alert",1);
        }

       
    }
}
