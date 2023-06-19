<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
        ]);

        if($request->image === null){
            User::where('id',auth()->user()->id)->update([
                'name' =>  $request->name,
                'email' => $request->email,
            ]);
        }else{
            $ext = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
            $ftype = $request->file('image')->getClientOriginalExtension();

            if(! in_array($ftype, $ext) ){
                Session::put('error', 'File must be an image');
                return redirect()->back();
            }else{
                if(Session::has('error')){
                    Session::remove('error');
                }
            }

            $file = $request->file('image');
            $img = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images',$file,$img);
            $img = 'images/' . $img;

            User::where('id',auth()->user()->id)->update([
                'name' =>  $request->name,
                'image' => $img,
                'email' => $request->email,
            ]);
        }

        return redirect()->back();
    }


    public function updateAccount(Request $request){
        $this->validate($request,[
            'oldpass' => 'required',
            'password' => 'required',
            'confpassword' => 'required',
        ]);

        $user = auth()->user();

        $temp=auth()->attempt(['email'=> $user->email, 'password'=>$request->oldpass]);
        // var_dump($user->password);
        // var_dump($temp);
        if(!($temp)){
            Session::put('error', 'Old password must be current password');
        }else if($request->password !== $request->confpassword){
            Session::put('error', 'Password must be the same as the confirm password');
        }else{
            if(Session::has('error')){
                Session::remove('error');
            }
            User::where('id',$user->id)->update([
                'password' =>  bcrypt($request->password),
            ]);
        }

        return redirect()->back();
    }
}
