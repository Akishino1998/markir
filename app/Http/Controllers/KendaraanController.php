<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefJenisKendaraan;
use App\UserKendaraan;
use App\UserAkun;
use App\Parkir;
use App\UserJukir;

class KendaraanController extends Controller
{
    function index(){
        $jukir = session('id');
        $data = Parkir::all()->where("jukir",$jukir)->where("stat_parkir","Parkir");
        // return $data;
        $jenis = RefJenisKendaraan::all();
        return view('kendaraan-parkir', compact('data','jenis'));
    }   
    function showJenis($id){
        
        $jukir = session('id');
        $data = Parkir::all()->where("jukir",$jukir)->where("stat_parkir","Parkir")->where("id_kendaraan",$id);
        $jenis = RefJenisKendaraan::all();
        // return $data->first()->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan;
        return view('kendaraan-parkir-jenis', compact('data','jenis','id'));


        
    }
}
