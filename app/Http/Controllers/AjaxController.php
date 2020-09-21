<?php

namespace App\Http\Controllers;

use App\userbiodata;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function index ($username){
        return userbiodata::all()->where("username",$username)->first();
    }
}
