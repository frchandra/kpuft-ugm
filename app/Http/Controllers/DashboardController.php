<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller{
    
    public function index(Request $request){
        $email = $request->session()->get('email');
        // calon = Calon::select('calon_id', 'nama')->get();//mungkin ndak dipake
        return view('dashboard', ['nama'=>$email]);
    }

    public function store(Request $request){
        //increment perolehan suara
        $calonId = (int)$request->input('calonId'); //berpotensi error bila user mengubah DOM dari formnya

            try {
                $affected = Calon::where('calon_id', $calonId)->update(['vote'=> DB::raw('vote+1')]);                
            } catch (\Throwable $th) {
                // dd($th);
                return "Access Denied...";
            }
            if($affected == 0){
                return "input invalid (bruhhh....)";
            }


        //logout kan si user
        $request->session()->put('is_voted', false);
        $email = $request->session()->pull('email');
        $request->session()->flush();

        //set user telah memilih 
        try {
            Dpt::where('email', $email)->update(['is_voted' => true]);            
        } catch (\Throwable $th) {
            // dd($th);
            return "access denied";
        }

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

        return redirect(env("APP_URL")."/#/terimakasih");
    }



}
