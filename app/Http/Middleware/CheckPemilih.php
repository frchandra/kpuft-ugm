<?php

namespace App\Http\Middleware;

use Closure;
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

        // if(env('IS_OPEN') == 'TRUE'){
            if($request->session()->get('is_voted') === true){
                // return $next($request);
                $response = $next($request);
     
                return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma','no-cache')
                        ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            }
            else{
                return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
                // return redirect('http://127.0.0.1:8000/index.html');
            }
        // }
        // dd('belum buka');
    


    }
}
