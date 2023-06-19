@extends('layout.template')
@section('content')
    <div class="contentc">
        <div style="display: flex; justify-content:flex-end; width :70%;">
            <form action="/process">
                <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Post Forum</b> </button>
            </form>
        </div>
        @foreach ($forums as $forum)
        @php
            // dd($id, $game)
        @endphp
            <div style="width:99%; display:flex; justify-content:center; margin: 10px;">
                <div style="min-width : 60vw;max-width: 60vw; min-height:5em; display: flex; justify-content:center; align-items:center; background:white; padding:10px; border:0.1px rgb(196, 196, 196) solid; border-width:thin; gap:5px;">
                        <div style="min-width: 10vw; display :flex; justify-content:space-evenly; gap:5px; align-items:center;">
                            <img src="{{Storage::url($forum->user->image)}}" alt="" style="width : 40px; height:40px; border-radius:50%;">
                        </div>
                        <div style="min-width: 40vw; max-width:10vw">
                            <p style="min-width: 25vw;">{{$forum->title}}</p>
                            <p style="min-width: 8vw; font-size: 12px;" >{{$forum->date}}</p>
                            <p style="min-width: 8vw; font-size: 12px;" >{{$forum->description}}</p>
                        </div>
                        <div style="min-width : 10vw; max-width:10vw; padding-left:20px;">
                            <img src="{{Storage::url('/images/comment.png')}}" class="searchicon" alt="">
                            <p style="min-width: 8vw; padding-left:35px; padding-top:3px;" >{{$forum->comments->count()}}</p>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
