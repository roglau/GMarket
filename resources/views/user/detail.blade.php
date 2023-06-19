@extends('layout.template')
@section('content')
    <div class="detailcon">
        {{-- <img src="{{Storage::url($game->image)}}" alt="" style="width: 80vw;height: 80vh;border-radius: 2%; position: absolute; z-index: 0  ; margin-top : 30px;"> --}}
        <div style = "display: flex;justify-content: center;align-items: center;flex-direction: column;gap: 20px;width: 80vw;height: 80vh;border-radius: 2%; margin-bottom:2em; background-image:url('{{Storage::url($game->image)}}');background-size: cover;
            background-attachment: fixed; ">
            <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;position: absolute; top: 5.7em; left: 10.4em; width: 80vw;height: 80vh; background-color: rgba(0, 0, 0, 0.26); border-radius: 2%;">
                <h1 style="color: rgb(254, 254, 254); font-size:42px;">{{$game->title}}</h1>
                <div class="dbox" style="display:flex; justify-content:space-between; align-items:center; background:rgba(255, 255, 255,0.5); width:65vw; height:40vh; border-radius:2%; padding:10px;">
                    <div class="dleft" style="display: flex; flex-direction:column; width:35vw; align-items:baseline; gap:10px;">
                        @php
                            $genre = DB::table('genres')->find($game->genreid)
                        @endphp
                        <div style="display: flex; justify-content:center; align-items:center; font-weight:bold;">
                            <p style="margin:5px; padding : 5px; color:green; background:rgb(176, 250, 176)">{{$genre->genrename}}</p>
                        </div>
                        <p style="color: rgb(245, 245, 245); font-weight:bold; font-size:20px; padding:5px;">{{$game->description}}</p>

                    </div>
                    <div class="dright" style="display: flex; flex-direction:column; width:15vw; align-items:flex-end; gap:10px;">
                        <div style="display: flex; gap:10px;">
                            <p style="background : red; color:white; font-size:28px; font-weight:bold; padding:5px; width:2em; text-align:center;">{{$game->rating}}</p>
                            <p>@if ($game->price == 0)
                                <h4 style="color:rgb(245, 245, 245); font-size:28px; font-weight:bold; text-align:center;">{{"Free"}}</h4>
                              @else
                               <h4 style="color:rgb(245, 245, 245); font-size:28px; font-weight:bold; text-align:center;">$ {{$game->price}}</h4>
                              @endif</p>
                        </div>
                        <div style="display: flex; justify-content:center; align-items:center; width:10vw;">
                            @auth
                            <form action="/addcart/{{$game->id}}">
                                <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Add to cart</b> </button>
                            </form>
                            @else
                            <form action="/login">
                                <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin:10px;border-radius:5%;"> <b style="color: white">Add to cart</b> </button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

@endsection
