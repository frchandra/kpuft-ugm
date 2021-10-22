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
    public function handle(Request $request, Closure $next)
    {

        if($request->session()->has('is_voted')){
            return $next($request);
        }
        else{
            return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
        }
    }
}
