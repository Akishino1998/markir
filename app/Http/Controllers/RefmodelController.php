<?php

namespace App\Http\Controllers;

use App\refmodel;
use Illuminate\Http\Request;

class RefmodelController extends Controller
{
    public function refmodel()
    {
        return view ("admin.refmodel");
    }


    public function index()
    {
        $ref_model = refmodel::all();
        // return $ref_model;
        return view ('admin.refmodel',['refmodel'=>$ref_model]);
    }

    public function hapus($id_model)
    {
    
        $ref_model = refmodel::find($id_model);
        // return $ref_model;
        $ref_model->delete();

        return redirect("/admin/refmodel");
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_model'
        ]);
    }
}
