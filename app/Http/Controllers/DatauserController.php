<?php

namespace App\Http\Controllers;

use App\UserBiodata;
use Illuminate\Http\Request;

class DatauserController extends Controller
{

    public function datauser(){
        $userbiodata = UserBiodata::all()->first();
        // return $userbiodata;
        return view("admin.datauser",compact('userbiodata'));
    }
}
