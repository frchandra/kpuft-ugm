<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public function index(){    
        // $out = Cache::get('visit');        
        // if($out===null)
        //     Cache::put('visit', 0);        
        // if($out===10)
        //     Cache::decrement('visit', 10);  
        // Cache::increment('visit', 1);



        // var_dump((int)env('OPEN_AT', '69421'));  
        // return view('welcome');        
        return \File::get(public_path() . '/index.html'); //ini lebih befungsi ketimbang langsung mengakses /url.../index.html. Kalo langsung mengakses /url../index.html somehow jsnya nampilin halaman terakhir dibuat (in this case 404)
    }

    public function getStatus(){
        $out = Cache::remember('status', 10, function () {
            //fetching             
            return DB::table('dpts')->select(DB::raw('departemen, count(*)'))->where('is_voted', 1)->groupBy('departemen')->get();
        });
       
        return response()->json($out);
    }
}
