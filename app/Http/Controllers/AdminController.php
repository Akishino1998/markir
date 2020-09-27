<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\login;
class AdminController extends Controller
{
    public function index(){

        return view ("admin.admin");
    }
    

    public function admin()
    {
        $login = login::all();
        // return $login;
        return view ('admin.admin',['login'=>$login]);

    }

    public function hapus($id)
    {
        $login = login::find($id);
        // return $login;
        $login->delete();

        return redirect("/admin/admin");
    }

    public function store(Request $request)
    {
       $login = new login;
       $login->username = $request->username;
       $login->password = $request->password;
       $login->nama = $request->nama;
       $login->save();

    //    return $login;
       return redirect("/admin");

    }

}
