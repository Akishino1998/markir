<?php

namespace App\Http\Controllers;

use App\refbiaya;
use Illuminate\Http\Request;

class RefbiayaController extends Controller
{
    public function refbiaya()
    {
        return view("admin.refbiaya");   
    }
    public function index()
        {
            $ref_info_kendaraan = refbiaya::all();

            // return $ref_info_kendaraan;

            return view("admin.refbiaya",["refbiaya"=>$ref_info_kendaraan]);
        }

    public function hapus($id_ref_kendaraan)
    {
        $ref_info_kendaraan = refbiaya::find($id_ref_kendaraan);
        $ref_info_kendaraan-> delete();
        
        return redirect("/admin/refbiaya");
    }

    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'jenis_kendaraan' => 'required',
            'biaya_per_jam' => 'required'
        ]);

       
        
        refbiaya::create([
            'jenis_kendaraan' =>$request ->jenis_kendaraan,
            'biaya_per_jam' =>$request->biaya_per_jam
        ]);
        // return $request;
        return redirect("/admin/refbiaya");
    }
    function edit(Request $request, $id){
        $refbiaya = refbiaya::find($id);
        $refbiaya->jenis_kendaraan = $request->jenis_kendaraan;
        $refbiaya->biaya_per_jam = $request->biaya_per_jam;
        $refbiaya->save();
        return redirect("/admin/refbiaya");

    }

}
