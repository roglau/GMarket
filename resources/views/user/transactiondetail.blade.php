@extends('layout.template')
@section('content')
    <div class="contentc">
        <div style="width: 100%; display:flex;justify-content:center; margin-top:20px">
            <div style="display: flex; justify-content:space-around;  min-width:50vw;">
                <p style="min-width: 20vw; font-size:20px">Transaction ID : {{$th->id}}</p>
                <p style="min-width: 30vw; font-size:20px">Transaction Date : {{$th->transactiondate}}</p>
            </div>
        </div>

        <div style="width: 100%; display:flex;justify-content:center; margin-top:20px">
            <div style="display: flex; justify-content:space-around;  min-width:50vw;">
                <p style="min-width: 20vw; font-size:20px">Customer : {{auth()->user()->name}}</p>
                <p style="min-width: 30vw; font-size:20px"></p>
            </div>
        </div>

        <div style="display: flex; justify-content:center; align-items:center; margin-top:30px; min-width:50vw;">
            <h5 style="min-width: 20vw">GAME TITLE</h5>
            <H5 style="min-width: 10vw">GAME PRICE</H5>
            <h5 style="min-width: 10vw">QUANTITY</h5>
            <H5 style="min-width: 10vw">SUB TOTAL</H5>
        </div>
        @php
            $total = 0;
        @endphp

        <div style="margin-top:10px;"></div>
        @foreach ($td as $transaction)
            <div style="width:100%; display:flex; justify-content:center;">
                <div style="display: flex; justify-content:center; align-items:center; min-width:50vw; background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; ">
                    @php
                        $game = App\Models\Games::where('id',$transaction->gameid)->first();
                        $subtotal = 0;
                    @endphp
                    <h5 style="min-width: 20vw">{{$game->title}}</h5>
                    <H5 style="min-width: 10vw">{{$game->price}}</H5>
                    <h5 style="min-width: 10vw">{{$transaction->quantity}}</h5>
                    <H5 style="min-width: 10vw">${{$subtotal = $transaction->quantity * $game->price}}</H5>
                    @php
                        $total+=$subtotal;
                    @endphp
                </div>
            </div>
        @endforeach
        <div style="display: flex; justify-content:center; align-items:center; margin-top:30px; min-width:50vw;">
            <h5 style="min-width: 20vw"></h5>
            <H5 style="min-width: 10vw"></H5>
            <h5 style="min-width: 10vw"></h5>
            <p style="min-width: 10vw; font-size:20px">TOTAL : ${{$total}}</p>
        </div>
    </div>
@endsection
