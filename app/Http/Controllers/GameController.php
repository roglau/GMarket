<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class GameController extends Controller
{
    public function detail(Request $request){
        $game=Games::find($request->route('id'));
        return view('user.detail',compact('game'));
    }

    public function managegame(){
        // var_dump(Route::getCurrentRoute()->getName());
        $games = Games::all();
        return view('admin.managegame',compact('games'));
    }

    public function managegenre(){
        $genres = Genre::all();
        return view('admin.managegenre',compact('genres'));
    }

    public function updateGenrePage(Request $request){
        $genre = Genre::find($request->route('id'));
        return view('admin.updateGenre',compact('genre'));
    }

    public function updateGenre(Request $request){
        $this->validate($request,[
            'genrename' => 'required|unique:genres'
        ]);

        Genre::where('id',$request->route('id'))->update([
            'genrename' => $request->genrename
        ]);

        return redirect('/managegenre');
    }

    public function insert(){
        $genres = Genre::all();
        return view('admin.insertgame',compact('genres'));
    }

    public function update(Request $request){
        $game = Games::find($request->route('id'));
        $genres = Genre::all();
        return view('admin.updategame',compact('game','genres'));
    }

    public function insertGame(Request $request){
        // var_dump(strcmp($request->genre,"1"));
        if(strcmp($request->genre,"1") ===0){
            $this->validate($request,[
                'title' => 'required',
                'image' => 'required',
                'desc' => 'required',
                'price' => 'required',
                'genrename' => 'required|unique:genres',
                'rating' => 'required',
            ]);
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

            Genre::insert([
                'name' => $request->newgenre,
            ]);

            $genre = Genre::where('name', $request->newgenre)->first();

            Games::insert([
                'title' =>  $request->title,
                'image' => $img,
                'description' => $request->desc,
                'price' => $request->price,
                'genreid' => $genre->id,
                'rating' => $request->rating
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required',
                'image' => 'required',
                'desc' => 'required',
                'price' => 'required',
                'genre' => 'required',
                'rating' => 'required',
            ]);
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

            $genre = Genre::where('name', $request->genre)->first();

            Games::insert([
                'title' =>  $request->title,
                'image' => $img,
                'description' => $request->desc,
                'price' => $request->price,
                'genreid' => $genre->id,
                'rating' => $request->rating
            ]);
        }
        return redirect('managegame');

    }

    public function updateGame(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'genre' => 'required',
            'rating' => 'required',
        ]);

        $genre = Genre::where('genrename', $request->genre)->first();
        // var_dump($genre);

        if($request->image === null){
            Games::where('id',$request->route('id'))->update([
                'title' =>  $request->title,
                'description' => $request->desc,
                'price' => $request->price,
                'genreid' => $genre->id,
                'rating' => $request->rating
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

            Games::where('id',$request->route('id'))->update([
                'title' =>  $request->title,
                'image' => $img,
                'description' => $request->desc,
                'price' => $request->price,
                'genreid' => $genre->id,
                'rating' => $request->rating
            ]);
        }


        return redirect('managegame');
    }

    public function deleteGame(Request  $request){
        // var_dump($request->route('id'));
        Games::find($request->route('id'))->delete();
        return redirect()->back();
    }
}
