@extends('layout.template')
@section('content')
    <div class="contentc">
        <div style="display: flex; justify-content:space-evenly; align-items:center; margin-top: 30px; margin-bottom:5px; gap:10px; min-width:60vw;">
            <h5 style="min-width: 20vw">GAME GENRE</h5>
            <h5 style="min-width: 10vw"></h5>
        </div>

        @foreach ($genres as $genre)
        <div style="width:100%; display:flex; justify-content:center;">
            <div style="display: flex; justify-content:space-between; align-items:center; width:53%;  background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin">
                <p style="min-width: 20vw; font-size:18px;">{{$genre->genrename}}</p>
                <form action="/updategenre/{{$genre->id}}">
                    <button style="border:0;background:none; min-width:10vw; cursor: pointer; color:blue; font-size:16px;"> Edit </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

@endsection
