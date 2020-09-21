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

    public function index()
    {
        $tb_parkir = parkirmasuk::all()->where("stat_parkir","Sudah")->where("jukir","");

        return view("admin.datakendaraan",["datakendaraan"=>$tb_parkir]);
    }
}
