<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefJenisKendaraan;
use App\Parkir;
use Barryvdh\DomPDF\Facade as PDF;
use DateTIme;
class RiwayatParkirController extends Controller
{
    function index(){
        
        $jukir = session('id-jukir');
        $jenis = RefJenisKendaraan::all();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();

        $data = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->paginate(10);
        $data2 = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->get();
        if(isset($_GET["tgl"])){
            $date = new DateTime($_GET['tgl']);
            $data = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->paginate(10);
            $data2 = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->get();
        }
        return view('jukir.riwayat-parkir',compact('jenis','jukir','data','data2'));

    }
    function showAll(){ 
        $jukir = session('id-jukir');
        $jenis = RefJenisKendaraan::all();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();

        $data = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->paginate(10);
        $data2 = Parkir::latest()->where("jukir",$jukir)->where("stat_parkir","Sudah")->where('tgl_keluar',"LIKE","".$date->format('Y-m-d')."%")->get();
        
        return view('jukir.riwayat-parkir',compact('jenis','jukir','data','data2'));

    }
    function showDate(Request $request){
        // return $request;
        $jukir = session('username-jukir');
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
        $jukir = session('username-jukir');
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
