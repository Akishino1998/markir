<?php

namespace App\Http\Controllers;

use App\UserAkun;
use App\UserJukir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\UserJukirBiodata;
class AuthController extends Controller
{
    public function index(){
        return view('jukir.login');
    }
    function masukkan_seri_alat($id){
        $user = UserJukir::find($id);
        return view('jukir.masukan_seri_alat', compact('user')); 
    }
    function Setmasukkan_seri_alat($id, Request $request){
        $user = UserJukir::find($id);
        $user->no_seri_alat = $request->no_seri_alat;
        $user->save();
        return redirect('/jukir')->with('alert','1'); //benar
    }
    public function login(Request $request){
        $cek = UserJukir::all()->where('username',$request->username)->COUNT();
        if($cek > 0){
            $user = UserJukir::all()->where('username',$request->username)->first();
            // return $user;
            if (password_verify($request->password, $user->password)) {
                if($user->status == "aktif"){
                    session(['username-jukir'=> $request->username]);
                    session(['id-jukir'=> $user->id]);
                    session(['nama-jukir'=> $user->UserJukirBiodata->nama]);
                    session(['foto-jukir'=> $user->UserJukirBiodata->foto]);
                    session(['no_hp-jukir'=> $user->UserJukirBiodata->no_hp]);
                    session(['status-jukir'=> $user->status]);
                    // return 1;
                    if($user->no_seri_alat == "-" || $user->no_seri_alat == "NULL"){
                        return redirect("/jukir/masukkan-seri-alat/".$user->id)->with("alert",'1');
                    }else{
                        return redirect('/jukir')->with('alert','1'); //benar
                    }

                }else if($user->status == "N"){
                    return redirect('/jukir/login')->with('alert','4');//belum di verifikasi 
                }else if($user->status == "non"){
                    return redirect('/jukir/login')->with('alert','5');//dinon aktifkan
                }else if($user->status == "tolak"){
                    return redirect('/jukir/login')->with('alert','6');//tidak disetujui
                }
            }else{
                // return 1;
                return redirect('/jukir/login')->with('alert','2');//salah
            }
        }else{
            return redirect('/jukir/login')->with('alert','3');//tidak terdaftar
        }
    }
    function showBiodata(){
        $username = session('username-jukir');
        $data = UserJukir::all()->where('username',$username)->first();
        return view('jukir.profile', compact('data')); 
    }
    function editBiodata(){
        $username = session('username-jukir');
        $data = UserJukir::all()->where('username',$username)->first();
        return view('jukir.edit-biodata', compact('data')); 
    }
    function update(Request $request){
        // return $request;
        $UserJukirBiodata = UserJukirBiodata::where('id_jukir',$request->id)->first();
        // return $UserJukirBiodata;
        $UserJukirBiodata->nama = $request->nama;
        $UserJukirBiodata->no_hp = $request->no_hp;
        $UserJukirBiodata->email = $request->email;
        if ($request->hasFile('foto')) {
            $file       = $request->file('foto');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            $file->move("foto-user-jukir",$fileName);
            $UserJukirBiodata->foto = $fileName;
            session(['foto-jukir'=> $fileName]);
        }
        session(['nama-jukir'=> $request->nama]);
       
        
        $UserJukirBiodata->save();
        session(['nama-jukir'=> $request->nama]);
        return redirect('/jukir/profile');

        
    }
}
