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

        return 'belum buka';


    }
    
    public function handleGoogleCallback(Request $request){
        
        try {
            $email = Socialite::driver('google')->user()->email;               
        } catch (\Throwable $th) {
            return '404';
        }
       
        
        $user = Dpt::where('email', $email)->where('is_voted', false)->get();

        if(!$user->isEmpty() && str_contains($email, 'ugm.ac.id')){            
            $request->session()->put('is_voted', true);
            $request->session()->put('email', $email);
            return redirect('dashboard')->with('nama', $email);
        }

        // return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
        return redirect('http://127.0.0.1:8000/index.html');
        

    }

}
