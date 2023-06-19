@extends('layout.template')
@section('content')
    <div class="contentc">

        @if (Session::has('success'))
        <div style="display: flex; justify-content:center; align-items:center; gap:10px; margin:5px;">
            <img src="{{Storage::url('/images/check.png')}}" alt="" class="profileicon">
            <p style="font-size:18px">{{Session::get('success')}}</p>
        </div>
        @endif

        @if (Session::has('cart'))
        <div style="display: flex; justify-content:flex-end; width :70%;">
            <form action="/checkout">
                <button style="border:0; background-color:rgb(40, 103, 248); width:6em; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Checkout</b> </button>
            </form>
        </div>

        <div style="display: flex; justify-content:center; align-items:center; margin-top:30px; gap:15px; min-width:60vw;">
            <h5 style="min-width: 30vw">GAME TITLE</h5>
            <H5 style="min-width: 8vw">GAME PRICE</H5>
            <h5 style="min-width: 8vw">QUANTITY</h5>
            <h5 style="min-width: 8vw"></h5>
            <h5 style="min-width: 8vw"></h5>
        </div>


        @foreach (Session::get('cart') as $id => $game )
        @php
            // dd($id, $game)
        @endphp
        <form action="/updatecart/{{$id}}" method="POST">
            @csrf
            <div style="width:100%; display:flex; justify-content:center;">
                <div style="min-width: 60vw; display: flex; justify-content:center; align-items:center; gap:10px; background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                        <div style="min-width: 30vw; display :flex; justify-content:space-evenly; gap:5px; align-items:center;">
                            <img src="{{Storage::url($game['image'])}}" alt="" style="width : 25px; height:25px; border-radius:50%;">
                            <p style="min-width: 25vw;">{{$game['title']}}</p>
                        </div>

                        <p style="min-width: 8vw">{{$game['price']}}</p>
                        <input type="number" name="quantity" id="quantity" min="1" value="{{$game['quantity']}}" style="max-width: 8vw">

                        <button style="border:0;background:none; min-width:8vw; cursor: pointer; color:blue; font-size:16px;"> Update </button>

                        <a href="/deletecart/{{$id}}" style="border:0;background:none; min-width:8vw; cursor: pointer; color:red; font-size:16px; font-family:tahoma; text-align: center;">Delete</a>
                </div>
            </div>
        </form>
        @endforeach

        @else
            <div style="display: flex; justify-content:center; align-items:center; gap:10px; margin-top:45vh;">
            <p style="font-size:18px">No items in cart</p>
        </div>
        @endif

    </div>

@endsection
