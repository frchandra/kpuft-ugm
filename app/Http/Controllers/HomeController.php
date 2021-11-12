<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
              

        $out = Cache::remember('cache', 10, function () {
            // echo '====FETCHING====';             
            return DB::table('dpts')->select(DB::raw('departemen, count(*)'))->where('is_voted', 1)->groupBy('departemen')->get();
        });

        // echo $out;

        return view('welcome');
        
        // return \File::get(public_path() . '/index.html');
    }
}
