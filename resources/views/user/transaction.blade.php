@extends('layout.template')
@section('content')

    <div class="contentc">
        @if (Session::has('success'))
        <div style="display: flex; justify-content:center; align-items:center; gap:10px; margin:5px;">
            <img src="{{Storage::url('/images/check.png')}}" alt="" class="profileicon">
            <p style="font-size:18px">{{Session::get('success')}}</p>
        </div>
        @endif

        @if( isset($th)&& !empty($th))
            <div style="display: flex; justify-content:center; align-items:center; margin-top:30px; gap:10px; min-width:45vw;">
                <h5 style="min-width: 10vw">TRANSACTION ID</h5>
                <H5 style="min-width: 15vw">TRANSACTION DATE</H5>
                <h5 style="min-width: 10vw">TOTAL ITEM</h5>
                <H5 style="min-width: 10vw"></H5>
            </div>
            @foreach ($th as $transaction)
                <div style="width:100%; display:flex; justify-content:center;">
                    <div style="width: 50%; display: flex; justify-content:center; align-items:center; gap:5px; background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                            @php
                                $td = App\Models\Transactiondetail::where('transactionid',$transaction->id)->get();
                                $totalq = 0;
                                foreach ($td as $t) {
                                    $totalq += $t->quantity;
                                }
                            @endphp
                            <p style="min-width: 10vw">{{$transaction->id}}</p>
                            <p style="min-width: 15vw">{{$transaction->transactiondate}}</p>
                            <p style="min-width: 10vw">{{$totalq}}</p>
                            <a href="/transactiondetail/{{$transaction->id}}">
                                <button style="border:0;background:none; min-width:10vw; cursor: pointer; color:blue; font-size:16px;"> Details </button>
                            </a>
                    </div>
                </div>
            @endforeach
        @else
            <div style="display: flex; justify-content:center; align-items:center; gap:10px; margin-top:45vh;">
                <p style="font-size:18px">No history</p>
            </div>
        @endif

    </div>

@endsection
