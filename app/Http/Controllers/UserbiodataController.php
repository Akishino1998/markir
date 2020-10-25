<?php

namespace App\Http\Controllers;

use App\UserAkun;
use App\userbiodata;
use App\UserKendaraan;
use Illuminate\Http\Request;

class UserBiodataController extends Controller
{
    public function userbiodata()
    {
        return view("admin.userbiodata");
    }

    public function index()
    {
        $userAkun = UserAkun::all();
        // return $userAkun->first()->UserBiodata;
        $userKendaraan = UserKendaraan::all();
        // return $userKendaraan->where('username','4')->COUNT();
        // return $user_biodata;
        // return $userAkun;
        return view('admin.userbiodata',compact('userAkun','userKendaraan'));

    }

    function simpan(Request $request){
        $userbiodata = userbiodata::where("username",$request->username)->first();
        // return $userbiodata;
    }
    function verifikasi($id,$status){
        $userakun = UserAkun::find($id);
        $userakun->status = $status;
        $userakun->save();
        if($status == "tolak"){
            $userakun->delete();
        }
        return redirect('/admin/userbiodata');
    }
    function kendaraan($username){
        $kendaraan = UserKendaraan::all()->where('username',$username);
        $user = UserAkun::find($username);
        return view('admin.user.user_kendaraan',compact('kendaraan','user'));
    }
    function verifikasiKendaraan($id,$status){
        $userKendaraan = UserKendaraan::find($id);
        $userKendaraan->status = $status;
        $userKendaraan->save();
        if($status == "tolak"){
            $userKendaraan->delete();
        }
        return redirect('/admin/infokendaraan/'.$userKendaraan->username);
    }
}
