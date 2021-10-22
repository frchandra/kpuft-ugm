<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller{
    
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback(Request $request){
        
        try {
            $email = Socialite::driver('google')->user()->email;
            // var_dump($email);     
        } catch (\Throwable $th) {
            //throw $th;
        }



        $user = Dpt::where('email', $email)->where('is_voted', false)->get();

        if(!$user->isEmpty()){
            $request->session()->put('is_voted', true);
            $request->session()->put('email', $email);
            return redirect('dashboard');
        }

        return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
        

    }

}
