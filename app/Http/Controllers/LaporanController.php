<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parkirmasuk;
use PDF;
class LaporanController extends Controller
{
    public function index()
    {
        return view("admin.laporan");
    }

    public function laporan($status)
    {

        $tb_parkir = parkirmasuk::all()->where("stat_parkir",$status);
        // return $tb_parkir;  
        return view("admin.laporan",["laporan"=>$tb_parkir]);
    }

    public function laporanpdf($status)
    {
        $tb_parkir = parkirmasuk::all()->where("stat_parkir",$status);
        $pdf = PDF::loadView('admin.laporanpdf',['laporanpdf'=>$tb_parkir]);
        return $pdf->download('laporanpdf.pdf');
    }
}
