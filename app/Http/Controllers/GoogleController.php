<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller{
    
    public function redirectToGoogle(){
        if(env('IS_OPEN')=='TRUE'){
            return Socialite::driver('google')->with(['hd'=>'mail.ugm.ac.id'])->redirect();
        }
        //belum buka
        return 'belum buka';
    }
    
    public function handleGoogleCallback(Request $request){
        
        try {
            $email = Socialite::driver('google')->user()->email;               
        } catch (\Throwable $th) {
            //error karena mengakses kembali halaman login google
            return '404';
        }       
                
        $user = Dpt::where('email', $email)->where('is_voted', false)->get();

        //cek sudah vote? && sesuai ugm.ac.id?
        if(!$user->isEmpty() && str_contains($email, 'ugm.ac.id')){            
            $request->session()->put('is_voted', true);  //is voted dalam session maksudnya : apakah dia berhak memilih? (t/f)
            $request->session()->put('email', $email);
            return redirect('dashboard')->with('nama', $email);
        }

        //bila tidak memenuhi syarat diatas
        return ('anda sudah pernah ngevote blocked by : controller');
        

    }

}
