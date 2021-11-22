<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dpt;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller{
    
    public function redirectToGoogle(){
        $now = Carbon::now()->timestamp;
        if($now >= env('OPEN_AT') && $now <= env('CLOSE_AT')){
            return Socialite::driver('google')->stateless()->with(['hd'=>'mail.ugm.ac.id'])->redirect();
        }
        //belum buka
        return 'belum buka';
    }
    
    public function handleGoogleCallback(Request $request){
        
        try {
            $email = Socialite::driver('google')->stateless()->user()->email;               
        } catch (\Throwable $th) {
            //error karena mengakses kembali halaman login google
            // dd($th);
            return ('ACCESS DENIED');
        }       
                
        $user = Dpt::where('email', $email)->where('is_voted', false)->get();

        //cek sudah vote? && sesuai ugm.ac.id?
        if(!$user->isEmpty() && str_contains($email, '@mail.ugm.ac.id')){            
            $request->session()->put('is_voted', true);  //is voted dalam session maksudnya : apakah dia berhak memilih? (t/f)
            $request->session()->put('email', $email);
            return redirect('dashboard')->with('nama', $email);
        }

        //bila tidak memenuhi syarat diatas
        //atau bukan tidak eliglible atau bukan email ugm (somehow pass the security)
        
        return redirect(env("APP_URL")."#/error");
        // return ('anda sudah pernah ngevote blocked by : controller'); 
        

    }

}
