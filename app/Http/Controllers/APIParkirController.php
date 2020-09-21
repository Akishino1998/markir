<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;
use App\RefJenisKendaraan;
use App\UserJukir;
use App\UserKendaraan;
use DateTime;
class APIParkirController extends Controller
{
    function index($idKendaraan,$idJukir,$lat, $lng){
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();
        $data = Parkir::all()->where("id_kendaraan",$idKendaraan)->where("stat_parkir", "Parkir");
        if(COUNT($data) == 0){
            
            $parkir = new Parkir;
            $parkir->id_kendaraan   = $idKendaraan;
            $parkir->jukir          = $idJukir;
            $parkir->tgl_masuk      = $date->format('Y-m-d H:i:s');
            $parkir->stat_parkir    = "Parkir";
            $parkir->lat            = $lat;
            $parkir->lng            = $lng;
            $parkir->save();
        }else{
            $parkir = $data->first();
            $awal  = strtotime($parkir->tgl_masuk); //waktu awal
            $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
            $diff  = $akhir - $awal;
            $biaya = RefJenisKendaraan::all()->where("id_ref_kendaraan",$parkir->UserKendaraan->jenis_kendaraan)->first();
            // return $biaya;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $biaya = $jam*$biaya->biaya_per_jam;

            
            $parkir->biaya_parkir = $biaya;
            $parkir->stat_parkir    = "Sudah";
            $parkir->tgl_keluar = $date->format('Y-m-d H:i:s');
            $parkir->save();
        
        }
        
        return "SUKSES";

    }
    function index2(Request $request){
        // return $request;

        $dataKendaraan = UserKendaraan::all()->where("rfid_card",$request->rfid_card)->first();
        $idKendaraan = $dataKendaraan->id_kendaraan;

        $idJukir = $request->id_jukir;
        $lat = $request->lat;
        $lng = $request->lng;
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();
        $data = Parkir::all()->where("id_kendaraan",$idKendaraan)->where("stat_parkir", "Parkir");
        if(COUNT($data) == 0){
            // $data = UserKendaraan::all()->where("id_kendaraan",$idKendaraan)->first();
            $parkir = new Parkir;
            $parkir->id_kendaraan   = $idKendaraan;
            $parkir->jukir          = $idJukir;
            $parkir->tgl_masuk      = $date->format('Y-m-d H:i:s');
            $parkir->stat_parkir    = "Parkir";
            $parkir->lat            = $lat;
            $parkir->lng            = $lng;
            $parkir->save();
        }else{
            $parkir = $data->first();
            $awal  = strtotime($parkir->tgl_masuk); //waktu awal
            $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
            $diff  = $akhir - $awal;
            $biaya = RefJenisKendaraan::all()->where("id_ref_kendaraan",$parkir->UserKendaraan->jenis_kendaraan)->first();
            // return $biaya;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $biaya = $jam*$biaya->biaya_per_jam;

            
            $parkir->biaya_parkir = $biaya;
            $parkir->stat_parkir    = "Sudah";
            $parkir->tgl_keluar = $date->format('Y-m-d H:i:s');
            $parkir->save();
        
        }
        return redirect("/setParkir");

    }
    function setParkir(){
        $jukir = UserJukir::all();
        $kendaraan = UserKendaraan::all()->where('rfid_card', '!=', NULL);
        // return $kendaraan;
        // return $kendaraan->first()->UserAkun->UserBiodata;
        return view("setParkir", compact('jukir','kendaraan'));

    }
    function lokasiKendaraan($idAlat, $lat, $lng){
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();
        $kendaraan = UserKendaraan::all()->where("no_alat",$idAlat);
        if($kendaraan->COUNT() != 0){
            $kendaraan = $kendaraan->first();
            $kendaraan->lat = $lat;
            $kendaraan->lng = $lng;
            $kendaraan->lokasi_terakhir = $date->format('Y-m-d H:i:s');
            $kendaraan->save();
            return "*";
        }
        return "#";
        
    }
    function serParkirIoT($id_rfid, $idAlat, $lat, $lng){
        $data = UserJukir::all()->where("no_seri_alat",$idAlat)->first();
        $idJukir = $data->id;

        $dataKendaraan = UserKendaraan::all()->where("rfid_card",$id_rfid)->first();
        $idKendaraan = $dataKendaraan->id_kendaraan;
        
        $lat = $lat;
        $lng = $lng;
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = new DateTime();
        $data = Parkir::all()->where("id_kendaraan",$idKendaraan)->where("stat_parkir", "Parkir");
        if(COUNT($data) == 0){
            $parkir = new Parkir;
            $parkir->id_kendaraan   = $idKendaraan;
            $parkir->jukir          = $idJukir;
            $parkir->tgl_masuk      = $date->format('Y-m-d H:i:s');
            $parkir->stat_parkir    = "Parkir";
            $parkir->lat            = $lat;
            $parkir->lng            = $lng;
            $parkir->save();
            return "*Parkir Masuk*".$dataKendaraan->noRegistrasi."*".$dataKendaraan->RefMerk1->merk." ".$dataKendaraan->seri." ".$dataKendaraan->warna."#";
        }else{
            $parkir = $data->first();
            $awal  = strtotime($parkir->tgl_masuk); //waktu awal
            $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
            $diff  = $akhir - $awal;
            $biaya = RefJenisKendaraan::all()->where("id_ref_kendaraan",$parkir->UserKendaraan->jenis_kendaraan)->first();
            // return $biaya;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $biaya = $jam*$biaya->biaya_per_jam;

            
            $parkir->biaya_parkir = $biaya;
            $parkir->stat_parkir    = "Sudah";
            $parkir->tgl_keluar = $date->format('Y-m-d H:i:s');
            $parkir->save();
            return "*Parkir Keluar*".$dataKendaraan->noRegistrasi."*".$dataKendaraan->RefMerk1->merk." ".$dataKendaraan->seri." ".$dataKendaraan->warna."*".$biaya."#";
        }
    }
}
