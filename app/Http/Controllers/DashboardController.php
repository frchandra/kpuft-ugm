<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{
    
    public function index(){
        $calon = Calon::select('calon_id', 'nama')->get();
        return view('dashboard', ['calons'=>$calon]);
    }

    public function store(Request $request){
        // var_dump($request->input('calonId'));
        $calonId = (int)$request->input('calonId');
        Calon::where('calon_id', $calonId)->update(['vote'=> DB::raw('vote+1')]);
        $request->session()->put('is_voted', false);
        $email = $request->session()->pull('email');
        $request->session()->flush();
        Dpt::where('email', $email)->update(['is_voted' => true]);
        return redirect('/');
    }



}
