<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{

    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $remember=$request->remember;
        $temp=auth()->attempt(['email'=> $email, 'password'=>$password]);
        if(!$temp){
            return redirect('/login')->withErrors(new MessageBag(['Email or password is invalid']));
        }


        if($remember){
            Cookie::queue('email',$email,60*24*7);
            Cookie::queue('password',$password,60*24*7);
        }else{
            Cookie::queue('email',$email,-1);
            Cookie::queue('password',$password,-1);
        }

        return redirect('/');
    }

    public function regisPage(){
        $now = Carbon::now();
        return view('auth.regis',compact('now'));
    }

    public function regis(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob
        ]);
        
        return redirect('login');
    }

    public function logout(){
        session()->flush();
        auth()->logout();

        return redirect('/');
    }
}
