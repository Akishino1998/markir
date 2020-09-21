<?php

namespace App\Http\Controllers;

use App\jukir;
use Illuminate\Http\Request;

class DatavalidasiController extends Controller
{
    public function datavalidasi(){
        return view("datavalidasi");
    }

    public function index(){
        $user_biodata_jukir = jukir::all();
        return view("admin.jukir",["jukir"=>$user_biodata_jukir]);
    }
}
