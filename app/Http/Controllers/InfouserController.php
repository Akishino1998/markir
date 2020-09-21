<?php

namespace App\Http\Controllers;

use App\infouser;
use App\parkirmasuk;
use App\refbiaya;
use App\UserKendaraan;
use Illuminate\Http\Request;

class InfouserController extends Controller
{
    public function infouser()
    {
        return view("admin.infouser");
    }

    public function index()
    {
        $user_kendaraan = UserKendaraan::first();
        
        // return $user_biodata;

        return view('admin.infouser',['infouser'=>$user_kendaraan]);
    }

    public function showdata($username)
    {
        $parkirmasuk = parkirmasuk::all()->where("stat_parkir","Sudah");
        $user_kendaraan = UserKendaraan::all()->where('username',$username);
        // return $parkirmasuk;
        $refbiaya=refbiaya::all();
        // return $refbiaya;
        // return $parkirmasuk;
        // return $parkirmasuk;
        return view('admin.infouser',compact('parkirmasuk','refbiaya','username','user_kendaraan'));
    }

    
}
