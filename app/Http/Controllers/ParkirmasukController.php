<?php

namespace App\Http\Controllers;

use App\jukir;
use App\parkirmasuk;
use App\tb_parkir;
use App\refbiaya;
use App\refmodel;
use App\UserJukir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParkirmasukController extends Controller
{
    public function parkirmasuk(){
      return view ("admin.parkirmasuk"); 
    }

    
    public function index()
    {
      $tb_parkir = parkirmasuk::all()->where("stat_parkir","Parkir");;
        if(isset($_GET["jukir"])){
            if($_GET["jukir"] == 0){
                $tb_parkir = parkirmasuk::all()->where("stat_parkir","Parkir");
            }else{
                $tb_parkir = parkirmasuk::all()->where("stat_parkir","Parkir")->where('jukir',$_GET["jukir"]);
            }
            
        }
        // return $tb_parkir->first()->UserKendaraan->UserAkun->UserBiodata;
        $jukir=UserJukir::all();
        $refbiaya=refbiaya::all();
        // return $jukir-> first()->UserJukirBiodata;
      return view('admin.parkirmasuk',compact('tb_parkir','jukir','refbiaya'));
    }

}

