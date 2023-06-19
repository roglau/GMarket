<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart(){
        return view('user.cart');
    }

    public function addCart(Request $request){
        // dd(Session::get('cart'));
        $id = $request->route('id');
        $game = Games::find($id);
        $cart = Session::get('cart');

        $cart[$id] = [
            "title" => $game->title,
            "image" => $game->image,
            "price" => $game->price,
            "quantity" => 1,
        ];

        Session::put('cart', $cart);
        return redirect('/')->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request){
        $id = $request->route('id');
        $game = Games::find($id);
        $cart = Session::get('cart');

        $cart[$id] = [
            "title" => $game->title,
            "image" => $game->image,
            "price" => $game->price,
            "quantity" => $request->quantity,
        ];

        Session::put('cart', $cart);
        return redirect('cart')->with('success', 'Cart updated successfully!');
    }

    public function deleteCart(Request $request){
        $id = $request->route('id');
        $cart = Session::get('cart');

        unset($cart[$id]);
        if($cart==null){
            Session::remove('cart');
        }else{
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart deleted successfully!');
    }
}
