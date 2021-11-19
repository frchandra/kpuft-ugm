<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller{
    
    public function index(){
        $calon = Calon::select('calon_id', 'nama')->get();//mungkin ndak dipake
        return view('dashboard', ['calons'=>$calon]);
    }

    public function store(Request $request){
        //increment perolehan suara
        $calonId = (int)$request->input('calonId'); //berpotensi error bila user mengubah DOM dari formnya
        if($calonId!==null){
            try {
                Calon::where('calon_id', $calonId)->update(['vote'=> DB::raw('vote+1')]);                
            } catch (\Throwable $th) {
                // dd($th);
                return "Access Denied...";
            }
        }
        else{
            return "Access Denied";
        }

        //logout kan si user
        $request->session()->put('is_voted', false);
        $email = $request->session()->pull('email');
        $request->session()->flush();

        //set user telah memilih 
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
