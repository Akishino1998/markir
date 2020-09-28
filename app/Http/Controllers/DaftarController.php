<?php

namespace App\Http\Controllers;

use App\User;
use App\UserAkun;
use App\UserJukir;
use App\UserJukirBiodata;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    function index(){ 
        return view('register');
    }
    function store(Request $request){
        $file       = $request->file('foto');
        $fileNameFoto   = time() . '.' . $file->getClientOriginalExtension();
        $file->move("foto-user-jukir",$fileNameFoto);

        $file       = $request->file('foto_ktp');
        $fileNameFotoKtp   = time() . '.' . $file->getClientOriginalExtension();
        $file->move("User/foto-ktp-jukir",$fileNameFotoKtp);


        $user = new UserJukir;
        $user->username = $request->username;
        $user->password = password_hash ($request->password, PASSWORD_DEFAULT );
        $user->save();
        
        $last_id = UserJukir::all()->last()->id;
        
        $userBiodataJukir = new UserJukirBiodata;
        $userBiodataJukir->nama = $request->nama;
        $userBiodataJukir->no_hp = $request->no_hp;
        $userBiodataJukir->foto = $fileNameFoto;
        $userBiodataJukir->id_jukir = $last_id;
        $userBiodataJukir->foto_ktp = $fileNameFotoKtp;
        $userBiodataJukir->save();
        return redirect('/jukir/login')->with('alert','7');


        
    }
    function checkUsernameUser(Request $request){
        // return $request;
        $data = UserJukir::all()->where("username",$request->username)->COUNT();
        return $data;
    }
}
