<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefJenisKendaraan;
use App\Parkir;
use Barryvdh\DomPDF\Facade as PDF;

class RiwayatParkirController extends Controller
{
    function index(){
        $jukir = session('id');
        $jenis = RefJenisKendaraan::all();
        $data = Parkir::all()->where("jukir",$jukir)->where("stat_parkir","Sudah");
        // return $data->first()->UserKendaraan;
        return view('riwayat',compact('jenis','jukir','data'));

    }
    function showJenis($id){
        $jukir = session('id');
        $jenis = RefJenisKendaraan::all();
        $data = Parkir::all()->where("jukir",$jukir)->where("stat_parkir","Sudah");
        // return $data->first()->UserKendaraan;
        return view('riwayat-jenis',compact('jenis','jukir','data','id'));
    }
    function showDate(Request $request){
        // return $request;
        $jukir = session('username');
        $start = explode('/',$request->start);
        $tglAwal = $start[2]."-".$start[0]."-".$start[1];

        $end = explode('/',$request->end);
        $tglAkhir = $end[2]."-".$end[0]."-".$end[1];
        // return $tglAkhir;

                
        $data = Parkir::all()->where("jukir",$jukir)
            ->where("stat_parkir","Sudah")
            ->where('tgl_keluar', '<',$tglAkhir )
            ->where('tgl_keluar', '>',$tglAwal );
        $jenis = RefJenisKendaraan::all();
        // return $tglAwal;
        return view('riwayat',compact('data','jenis','jukir'));
        

    }

    function showDateJenis(Request $request){
        // return $request;
        $jukir = session('username');
        $start = explode('/',$request->start);
        $tglAwal = $start[2]."-".$start[0]."-".$start[1];

        $end = explode('/',$request->end);
        $tglAkhir = $end[2]."-".$end[0]."-".$end[1];
        // return $tglAkhir;

        $data = Parkir::all()->where("jukir",$jukir)
            ->where("stat_parkir","Sudah")
            ->where('tgl_keluar', '<',$tglAkhir )
            ->where('tgl_keluar', '>',$tglAwal );
        $jenis = RefJenisKendaraan::all();
        // return $data;
        // ParkirMasuk->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan 
        // return $data->where('id_parkir_keluar','2')->first()->ParkirMasuk->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan ;
        $id = $request->id_jenis;
        
        return view('riwayat-jenis',compact('data','jenis','id','request'));
    }
    
}
