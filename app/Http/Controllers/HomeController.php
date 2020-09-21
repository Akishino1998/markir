<?php

namespace App\Http\Controllers;

use App\jukir;
use App\parkirmasuk;
use App\refbiaya;
use App\UserAkun;
use App\UserJukir;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $jukir = jukir::all()->count();
        $jukir1 = UserJukir::all()->where('status','N')->count();
        $jukir2 = UserJukir::all()->where('status','Y')->count();
        $terkini = parkirmasuk::where('stat_parkir','Parkir')->get()->count();
        $riwayat = parkirmasuk::all()->count();
        $user_akun = UserAkun::all()->count();
        $parkir = parkirmasuk::all();
        $ref_jenis_kendaraan = refbiaya::all();
        $a=array();
        $b=array();
        $c=array();
        // return $parkir->first()->UserKendaraan->RefJenisKendaraan2;
        // return $jukir2;
        foreach($ref_jenis_kendaraan as $item){
            array_push($a,$item->jenis_kendaraan);
            $i = 0;
            foreach($parkir as $items){
                if($items->UserKendaraan->RefJenisKendaraan2->id_ref_kendaraan == $item->id_ref_kendaraan){
                    $i++;
                }
            }
            array_push($b, $i);
        }

        
        // return $b;
        // return $a;
    return view("admin.home",compact('jukir','terkini','riwayat','user_akun','a','b','jukir2','jukir1'));
    }
}
