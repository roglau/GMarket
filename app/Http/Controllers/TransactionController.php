<?php

namespace App\Http\Controllers;

use App\Models\Transactiondetail;
use App\Models\Transactionheader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function checkout(){
        if(Session::has('cart')){
            $date=Carbon::now()->format('Y-m-d H:i:s');
            $cart = Session::get('cart');

            $tid = Transactionheader::insertGetId([
                'userid' => auth()->user()->id,
                'transactiondate' => $date
            ]);

            foreach($cart as $id => $game){
                Transactiondetail::insert([
                    'transactionid' => $tid,
                    'gameid' => $id,
                    'quantity' => $game['quantity'],
                ]);
            }

            Session::remove('cart');


            return redirect('/transaction')->with('success','Checkout successful');
        }

        return abort('404');
    }

    public function checkoutPage(){
        return view('user.checkout');
    }

    public function transaction(){
        $th = Transactionheader::where('userid', auth()->user()->id)->get();

        return view('user.transaction',compact('th'));
    }

    public function transactionDetail(Request $request){
        $th = Transactionheader::where('id', $request->route('id'))->first();
        // dd($th->id);
        $td = TransactionDetail::where('transactionid', $request->route('id'))->get();

        return view('user.transactiondetail',compact('th','td'));
    }
}
