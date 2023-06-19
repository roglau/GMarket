<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request){
        $query= $request->query('search');

        if(Auth::user()){
            $user = Auth::user();
            $age = Carbon::parse($user->dob)->age;
            // var_dump($age);
            $games=Games::where([
                ['title','like',"%$query%"],
                ['rating','<=', "$age"]
                ])->paginate(10)->appends(['search'=>$query]);
        }else{
            $games=Games::where('title','like',"%$query%")->paginate(10)->appends(['search'=>$query]);
        }


        return view('user.home',compact('games'));
    }
}
