<?php

namespace App\Http\Controllers;

use App\UserAkun;
use App\UserJukir;
use App\UserKendaraan;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    static function getNotifJukir(){
        $jukir = UserJukir::latest()->where('status','N')->get();
        return $jukir;
    }
    static function getNotifUser(){ 
        $user = UserAkun::latest()->where('status','N')->get();
        return $user;
    }
    static function getNotifKendaraan(){
        $kendaraan = UserKendaraan::latest()->where('status','N')->get();
        return $kendaraan;
    }
}
