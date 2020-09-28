<?php

namespace App\Http\Controllers;

use App\parkirmasuk;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DatakendaraanController extends Controller
{
    public function datakendaraan()
    {
        return view("admin.datakendaraan");
    }

    public function index($status)
    {
        $tb_parkir = parkirmasuk::all()->where("stat_parkir",$status);
        // return $tb_parkir;
        return view("admin.datakendaraan",["datakendaraan"=>$tb_parkir]);
    }
}
