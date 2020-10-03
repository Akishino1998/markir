<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parkirmasuk;

class LaporanpdfController extends Controller
{
    public function laporanpdf()
    {

        $tb_parkir = parkirmasuk::all()->where("stat_parkir");
        // return $tb_parkir;  
        return view("admin.viewlaporan",["laporanpdf"=>$tb_parkir]);
    }
    

    public function viewlaporan()
    {
        $tb_parkir = parkirmasuk::all()->where("stat_parkir");
        $pdf = PDF::loadView('admin.viewlaporan',['viewlaporan'=>$tb_parkir]);
        return $pdf->download('viewlaporan.pdf');
    }
}
