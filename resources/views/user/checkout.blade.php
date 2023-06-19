@extends('layout.template')
@section('content')
    <div class="contentc">
        <div style="display: flex; justify-content:space-evenly; align-items:center; margin-top: 30px; margin-bottom:5px; gap:10px; min-width:60vw;">
            <h4 style="min-width: 20vw">Select Payment Method</h4>
            <h4 style="min-width: 10vw"></h4>
        </div>

        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <input type="radio" name="option" value="CreditCard" style="min-width : 2vw;">
                <img src="{{Storage::url('/images/creditcard.png')}}" style="width:10em; height:5em">
            </div>
        </div>

        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <input type="radio" name="option" value="PayPal" style="min-width : 2vw;">
                <img src="{{Storage::url('/images/paypal.png')}}" style="width:10em; height:5em">
            </div>
        </div>
        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <input type="radio" name="option" value="Ovo" style="min-width : 2vw;">
                <img src="{{Storage::url('/images/ovo.png')}}" style="width:10em; height:5em;">
            </div>
        </div>
        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <input type="radio" name="option" value="DANA" style="min-width : 2vw;">
                <img src="{{Storage::url('/images/dana.png')}}" style="width:10.5em; height:5em;">
            </div>
        </div>
        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <input type="radio" name="option" value="GoPay" style="min-width : 2vw;">
                <img src="{{Storage::url('/images/gopay.png')}}" style="width:10em; height:5em;">
            </div>
        </div>

        <div style="display: flex; justify-content:flex-end; width :70%;">
            <form action="/process">
                <button style="border:0; background-color:rgb(40, 103, 248); width:6em; height:4em; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Process Checkout</b> </button>
            </form>
        </div>
    </div>

@endsection
