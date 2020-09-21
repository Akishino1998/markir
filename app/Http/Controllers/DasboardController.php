<?php

namespace App\Http\Controllers;

use App\Parkir;
use App\RefJenisKendaraan;
use Illuminate\Http\Request;

class DasboardController extends Controller
{ 
    function index(){
        $jukir = session('id'); 
        $data = RefJenisKendaraan::all();
        
        $dataJenis = [];
        
        foreach($data as $item){
            $parkir = Parkir::all()->where("stat_parkir","Parkir")->where('jukir',$jukir);
            $i = 0;
            foreach($parkir as $items){
                if( $items->UserKendaraan->RefJenisKendaraan2->id_ref_kendaraan == $item->id_ref_kendaraan and $jukir == $items->jukir){
                    $i++;
                }
    
            }
            // $dataJenis[$j]=["jenis" =>$item->jenis_kendaraan,"total"=>$i];
            array_push($dataJenis,["jenis" =>$item->jenis_kendaraan,"total"=>$i]);

            $i++;
        } 
        // return $dataJenis[0];
        // return print_r(array_keys($dataJenis, "1"));

        return view('index', compact('dataJenis'));   
    }
}
