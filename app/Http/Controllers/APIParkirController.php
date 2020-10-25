<?php

namespace App\Http\Controllers;

use App\LokasiAlat;
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
            $menit = floor(($diff - $jam * (60 * 60))/60);
            $biaya = $jam*$biaya->biaya_per_jam+$biaya->biaya_per_jam;
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
            $menit = floor(($diff - $jam * (60 * 60))/60);
            $biaya = $jam*$biaya->biaya_per_jam+$biaya->biaya_per_jam;
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
            $getLokasi = LokasiAlat::latest()->where('id_alat',$kendaraan->first()->no_alat)->get();
            if($getLokasi->COUNT() > 0){

                $lat = $getLokasi->first()->lat;
                $lng = $getLokasi->first()->lng;
                return $getLokasi;
            }
            

            $kendaraan = $kendaraan->first();
            $kendaraan->lat = $lat;
            $kendaraan->lng = $lng;
            $kendaraan->lokasi_terakhir = $date->format('Y-m-d H:i:s');
            $kendaraan->save();
            return "*";
        }
        return "#";
        
    }
    function serParkirIoT($idAlat,$id_rfid, $lat, $lng){

        $data = UserJukir::all()->where("no_seri_alat",$idAlat);
        // return $data->COUNT();
        if($data->COUNT() != 0){
            if($data->first()->status == "aktif"){
                $idJukir = $data->first()->id;
                $dataKendaraan = UserKendaraan::all()->where("rfid_card",$id_rfid);
                if($dataKendaraan->COUNT() != 0){
                    $dataKendaraan = $dataKendaraan->first();
                    $idKendaraan = $dataKendaraan->id_kendaraan;
                    //data getLokasi *****
                    $getLokasi = LokasiAlat::latest()->where('id_alat',$data->first()->no_seri_alat)->get()->first();
    
                    // return $getLokasi
                    $lat = $getLokasi->lat;
                    $lng = $getLokasi->lng;
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $date = new DateTime();
                    $data = Parkir::all()->where("id_kendaraan",$idKendaraan)->where("stat_parkir", "Parkir");
                    $dataParkir = [];
    
                    if(COUNT($data) == 0){
                        $parkir = new Parkir;
                        $parkir->id_kendaraan   = $idKendaraan;
                        $parkir->jukir          = $idJukir;
                        $parkir->tgl_masuk      = $date->format('Y-m-d H:i:s');
                        $parkir->stat_parkir    = "Parkir";
                        $parkir->lat            = $lat;
                        $parkir->lng            = $lng;
                        $parkir->save();
    
                        $x['plat'] = $dataKendaraan->noRegistrasi;
                        array_push($dataParkir, $x);
                        $res['parkir'] = $dataParkir;
                        return "*".$dataKendaraan->noRegistrasi."#";
    
                        $res['status'] = "parkir";
                        return response()
                        ->json(['plat' => $dataKendaraan->noRegistrasi, 'status' => 'Parkir']);
                        return response($res);
                        return "*".$dataKendaraan->noRegistrasi."*".$dataKendaraan->RefMerk1->merk."*".$dataKendaraan->seri."*".$dataKendaraan->warna."*#";
                    }else{
                        $parkir = $data->first();
                        $awal  = strtotime($parkir->tgl_masuk); //waktu awal
                        $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
                        $diff  = $akhir - $awal;
                        $biaya = RefJenisKendaraan::all()->where("id_ref_kendaraan",$parkir->UserKendaraan->jenis_kendaraan)->first();
                        // return $biaya;
                        $jam   = floor($diff / (60 * 60));
                        $menit = floor(($diff - $jam * (60 * 60))/60);
                        $biaya = $jam*$biaya->biaya_per_jam+$biaya->biaya_per_jam;
     
         
                
                        $parkir->biaya_parkir = $biaya;
                        $parkir->stat_parkir    = "Sudah";
                        $parkir->tgl_keluar = $date->format('Y-m-d H:i:s');
                        $parkir->save();
    
                        $x['plat'] = $dataKendaraan->noRegistrasi;
                        array_push($dataParkir, $x);
                        $res['parkir'] = $dataParkir;
    
                        return "*Rp.".$biaya."#@";
                        $res['status'] = "keluar";
                        return response()
                        ->json(['plat' => $dataKendaraan->noRegistrasi, 'status' => 'Keluar']);
                        return response($res);
                        return "*".$dataKendaraan->noRegistrasi."*".$dataKendaraan->RefMerk1->merk."*".$dataKendaraan->seri."*".$dataKendaraan->warna."*".$biaya."*#";
                    }
                }else{
                    return "*"."Kendaraan#$";
                }
            }else{
                return "*"."Akun Anda#$";
            }
        }else{
            return "*"."Alat#$";
        }
    }
    function setLokasiAlat($idAlat, $lat, $lng){
        $alat = new LokasiAlat;
        $alat->lat = $lat;
        $alat->lng = $lng;
        $alat->id_alat = $idAlat;
        $alat->save();

        $user = UserKendaraan::all()->where('no_alat',$idAlat);
        // return $user->$id_kendaraan;
        if(COUNT($user) > 0){
            $user = UserKendaraan::find($user->first()->id_kendaraan);
            $user->lat = $lat;
            $user->lng = $lng;
            $user->save();
            return "SUKSES-UPDATE".$user->first()->noRegistrasi;
        }
        return "SUKSES";
    }
}
