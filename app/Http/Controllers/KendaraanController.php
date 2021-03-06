<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefJenisKendaraan;
use App\UserKendaraan;
use App\UserAkun;
use App\Parkir;
use App\UserJukir;
use Carbon\Carbon;
class KendaraanController extends Controller
{
    function index(){
        $jukir = session('id-jukir');
        $mytime = Carbon::now();
        $data2 = Parkir::latest()->where('jukir',$jukir)->where("stat_parkir","Parkir")->where('tgl_masuk',">=",$mytime->toDateString())->get();
        $data = Parkir::latest()->where('jukir',$jukir)->where("stat_parkir","Parkir")->get();
        // return $data; 
        $jenis = RefJenisKendaraan::all();
        // return $data;
        return view('jukir.parkir-terkini', compact('data','jenis','data2'));
    }   
    function showJenis($id){
        
        $jukir = session('id-jukir');
        $data = Parkir::all()->where("jukir",$jukir)->where("stat_parkir","Parkir")->where("id_kendaraan",$id);
        $jenis = RefJenisKendaraan::all();
        // return $data->first()->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan;
        return view('jukir.parkir-terkini', compact('data','jenis','id'));


        
    }
}
