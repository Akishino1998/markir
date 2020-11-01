<?php

namespace App\Http\Controllers;

use App\info;
use App\RefMerk;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info()
    {
        return view("admin.info");
    }

    public function index()
    {
        $ref_merk = RefMerk::all();

        return view("admin.info",["info"=>$ref_merk]);
    }


    public function hapus($id_merk)
    {
        
        $ref_merk = RefMerk::find($id_merk);
        $ref_merk->delete();

        return redirect("/admin/info");

    }

    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'merk'=>'required'
        ]);

        RefMerk::create([
            'merk' =>$request->merk
        ]);

        return redirect('/admin/info');
    }
    function edit(Request $request, $id){
        $merk = RefMerk::find($id);
        $merk->merk = $request->merk;
        $merk->save();
        return redirect('/admin/info');
    }
}
