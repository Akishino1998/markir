<?php

namespace App\Http\Controllers;

use App\parkirmasuk;
use App\refbiaya;
use App\UserJukir;
use App\UserJukirBiodata;
use Illuminate\Http\Request;

class JukirController extends Controller
{

    //view datajukir
    public function index()
    {
        $jukir = UserJukir::all();
        // return $jukir->first()->UserJukirBiodata;
        return view("admin.jukir",compact('jukir'));
    }
    //edit
    function edit($username){
        $jukir = UserJukir::all()->where("id",$username)->first();
        // return $jukir;heidi
        return view("admin.datavalidasi",compact('jukir'));
    }

    //save hasil verifikasi
    function simpan(Request $request){
        $jukir = UserJukir::where("username",$request->username)->first();
        return $jukir;
        $jukir->status = "aktif";
        $jukir->save();
        return redirect("/admin/jukir");
    }

    // hapus sementara

    public function hapus($username)
    {
        $jukir = UserJukir::where("id",$username)->first();
        // return $jukir;
        $jukir->status = "non";
        $jukir->save();
        return redirect("/admin/jukir");
    }

    //lihat mapsnya jukir
    function showJukir($username){
        $parkirmasuk   = parkirmasuk::all()->where("stat_parkir","Sudah")->where('jukir',$username);
        $refbiaya=refbiaya::all();
        return view("admin.jukirParkir",compact('parkirmasuk','refbiaya','username'));
        
    }
    function getInfoJukir($id){
        $jukir = UserJukir::find($id);
        $data = array(
            'UserJukir'  => UserJukir::find($id),
            'UserJukirBiodata' => UserJukirBiodata::all()->where("id_jukir",$jukir->id)->first(),
        );
        return $data;
    }
    function setStatus($id, $status){
        $jukir = UserJukir::find($id);
        $jukir->status = $status;
        $jukir->save();
        return redirect('/admin/jukir');
    }




}
