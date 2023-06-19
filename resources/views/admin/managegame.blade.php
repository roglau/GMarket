@extends('layout.template')
@section('content')
    <div class="contentc">

            <div style="display: flex; justify-content:flex-end; width :70%;">
                <form action="/insertgame">
                    <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Add Game</b> </button>

                </form>
            </div>

            <div style="display: flex; justify-content:center; align-items:center; margin-top:30px; gap:10px; min-width:60vw;">
                <h5 style="min-width: 20vw">GAME TITLE</h5>
                <H5 style="min-width: 8vw">PEGI RATING</H5>
                <h5 style="min-width: 8vw">GAME GENRE</h5>
                <H5 style="min-width: 8vw">GAME PRICE</H5>
                <h5 style="min-width: 8vw"></h5>
                <h5 style="min-width: 8vw"></h5>
            </div>

            @foreach ($games as $game)
            <div style="width:100%; display:flex; justify-content:center;">
                <div style="width: 65%; display: flex; justify-content:center; align-items:center; gap:5px; background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                        <p style="min-width: 20vw">{{$game->title}}</p>
                        <p style="min-width: 8vw">{{$game->rating}}</p>
                        @php
                        $genre = DB::table('genres')->find($game->genreid)
                        @endphp
                        <div style="display: flex; justify-content:center; align-items:center; min-width: 8vw;">
                            <p style="margin-right:3vw; padding : 5px; color:green; background:rgb(176, 250, 176);  text-align:center; min-width:5vw;">{{$genre->genrename}}</p>
                        </div>
                        <p style="min-width: 8vw">{{$game->price}}</p>
                        <form action="/updategame/{{$game->id}}">
                            <button style="border:0;background:none; min-width:8vw; cursor: pointer; color:blue; font-size:16px;"> Edit </button>
                        </form>
                        <form action="/deletegame/{{$game->id}}">
                            <button style="border:0;background:none; min-width:8vw; cursor: pointer; color:red; font-size:16px;"> Delete </button>
                        </form>
                </div>
            </div>
            @endforeach
            <div style="margin: 10px;">

            </div>
    </div>

@endsection
