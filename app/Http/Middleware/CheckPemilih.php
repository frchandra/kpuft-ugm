<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckPemilih
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        
        $now = Carbon::now()->timestamp;

        if($now >= env('OPEN_AT') && $now <= env('CLOSE_AT')){
            if($request->session()->get('is_voted') === true){
                
                $response = $next($request);
     
                return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma','no-cache')
                        ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            }
            else{               
                
                // dd("anda belum melakukan login atau sudah di logoutkan sistem");
                return redirect(env("APP_URL")."#/error");
            }
        }
        dd('belum buka (bruhhh.....)');
        // return redirect('...');
    


    }
}
