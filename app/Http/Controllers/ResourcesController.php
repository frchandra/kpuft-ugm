<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourcesController extends Controller
{
    public function getSuara(){
        $suara = DB::table('calons')->get();
        return response()->json($suara);
    }




}
