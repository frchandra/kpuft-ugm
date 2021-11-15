<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Prophecy\Call\Call;

class DashboardController extends Controller{
    
    public function index(){
        $calon = Calon::select('calon_id', 'nama')->get();
        return view('dashboard', ['calons'=>$calon]);
    }

    public function store(Request $request){
        //increment perolehan suara
        $calonId = (int)$request->input('calonId');
        Calon::where('calon_id', $calonId)->update(['vote'=> DB::raw('vote+1')]);

        //logout kan si user
        $request->session()->put('is_voted', false);
        $email = $request->session()->pull('email');
        $request->session()->flush();

        //set user telah nyoblos 
        Dpt::where('email', $email)->update(['is_voted' => true]);

        //optional, counter
        // $out = Cache::get('visit');        
        // if($out===null)
        //     Cache::put('visit', 0);        
        // if($out===10)
        //     Cache::put('status',  function () {
        //         //fetching             
        //         return DB::table('dpts')->select(DB::raw('departemen, count(*)'))->where('is_voted', 1)->groupBy('departemen')->get();
        //     });
        //     Cache::decrement('visit', 10);                    
        // Cache::increment('visit', 1);

        return redirect('/');
    }



}
