<?php

namespace App\Http\Controllers;

use App\Parkir;
use App\RefJenisKendaraan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DasboardController extends Controller
{ 
    function index(){
        $jukir = session('id-jukir'); 
        $data = RefJenisKendaraan::all();
        $dataJenis = [];
        $mytime = Carbon::now();
        $parkir = Parkir::latest()->where('jukir',$jukir)->where('tgl_masuk',">=",$mytime->toDateString())->get();
        // return $parkir;
        foreach($data as $item){
            $i = 0;
            foreach($parkir as $items){
                if( $items->UserKendaraan->RefJenisKendaraan2->id_ref_kendaraan == $item->id_ref_kendaraan and $jukir == $items->jukir){
                    $i++;
                }
            }
            array_push($dataJenis,["jenis" =>$item->jenis_kendaraan,"total"=>$i]);
            $i++;
        } 
        return view('jukir.index', compact('dataJenis','parkir'));   
    }
}
