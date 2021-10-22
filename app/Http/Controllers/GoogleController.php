<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller{
    
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback(){
        
        try {
            $user = Socialite::driver('google')->user();
            dd($user);
            

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

}
