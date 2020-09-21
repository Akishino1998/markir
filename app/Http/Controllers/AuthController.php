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
        return view('login');
    }
    function masukkan_seri_alat($id){
        $user = UserJukir::find($id);
        return view('masukkan_seri_alat', compact('user')); 
    }
    function Setmasukkan_seri_alat($id, Request $request){
        $user = UserJukir::find($id);
        $user->no_seri_alat = $request->no_seri_alat;
        $user->save();
        return redirect('/')->with('alert','1'); //benar
    }
    public function login(Request $request){
        $cek = UserJukir::all()->where('username',$request->username)->COUNT();
        if($cek > 0){
            $user = UserJukir::all()->where('username',$request->username)->first();
            // return $user;
            if (password_verify($request->password, $user->password)) {
                if($user->status == "aktif"){
                    session(['username'=> $request->username]);
                    session(['id'=> $user->id]);
                    session(['nama'=> $user->UserJukirBiodata->nama]);
                    session(['foto'=> $user->UserJukirBiodata->foto]);
                    session(['status'=> $user->status]);
                    if($user->no_seri_alat == "-"){
                        return redirect("/masukkan-seri-alat/".$user->id)->with("alert",'1');
                    }else{
                        return redirect('/')->with('alert','1'); //benar
                    }
                }else if($user->status == "N"){
                    return redirect('/login')->with('alert','4');//belum di verifikasi 
                }else if($user->status == "non"){
                    return redirect('/login')->with('alert','5');//dinon aktifkan
                }else if($user->status == "tolak"){
                    return redirect('/login')->with('alert','6');//tidak disetujui
                }
            }else{
                // return 1;
                return redirect('/login')->with('alert','2');//salah
            }
        }else{
            return redirect('/login')->with('alert','3');//tidak terdaftar
        }
    }
    function showBiodata(){
        $username = session('username');
        $data = UserJukir::all()->where('username',$username)->first();
        return view('biodata', compact('data')); 
    }
    function editBiodata(){
        $username = session('username');
        $data = UserJukir::all()->where('username',$username)->first();
        return view('edit_biodata', compact('data')); 
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
            session(['foto'=> $fileName]);
        }
        session(['nama'=> $request->nama]);
       
        
        $UserJukirBiodata->save();
        session(['nama'=> $request->nama]);
        return redirect('biodata');

        
    }
}
