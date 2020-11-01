<?php

namespace App\Http\Controllers;

use App\jukir;
use App\parkirkeluar;
use App\parkirmasuk;
use App\refbiaya;
use App\UserJukir;
use Illuminate\Http\Request;

class ParkirmkeluarController extends Controller
{
    public function parkirkeluar()
    {
        return view("admin.parkirkeluar");                                                                             
    }

    public function index()
    {
        // return $_GET['jukir'];
        $tb_parkir = parkirmasuk::all()->where("stat_parkir","Sudah");;
        if(isset($_GET["jukir"])){
            if($_GET["jukir"] == 0){
                $tb_parkir = parkirmasuk::all()->where("stat_parkir","Sudah");
            }else{
                $tb_parkir = parkirmasuk::all()->where("stat_parkir","Sudah")->where('jukir',$_GET["jukir"]);
            }
            
        }
        // return $tb_parkir;
        $jukir=UserJukir::all();
        $refbiaya=refbiaya::all();
        // return $jukir;
        return view('admin.parkirkeluar',compact('tb_parkir','jukir','refbiaya'));

    }
}
