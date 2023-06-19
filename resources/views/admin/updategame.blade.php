@extends('layout.template')
@section('content')
    <div class="contentc">

        <div style="display: flex; justify-content:center; width :55%; margin-top:20px;">
            <h2>Update Game</h2>
        </div>

        <form action="/updategame/{{$game->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="title" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Title</label>
                <input type="text" name="title" id="title" value="{{$game->title}}" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw;">
                <label for="image" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Photo</label>
                <div style="min-width: 25vw; display:flex; justify-content:space-between">
                    <img src="{{Storage::url($game->image)}}" alt="" style="width: 25px; height: 25px; border-radius:50%">
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="desc" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">Game Description</label>
                <textarea name="desc" id="desc" style="border : 2px black solid;height : 30px;min-width:25vw;">{{$game->description}}</textarea>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="price" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Price</label>
                <input type="number" name="price" id="price" value="{{$game->price}}" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="genre" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Genre</label>
                <select name="genre" id="genre" style="border : 2px black solid;height : 20px;min-width:25vw;">
                    @php
                        $gamegenre = Illuminate\Support\Facades\DB::table('genres')->find($game->genreid)
                        @endphp
                    @foreach ($genres as $genre)
                        @if ($genre === $gamegenre)
                            <option value={{$genre->genrename}} selected="selected">{{$genre->genrename}}</option>
                        @else
                            <option value={{$genre->genrename}} >{{$genre->genrename}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="rating" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">PEGI Rating</label>
                <select name="rating" id="rating" style="border : 2px black solid;height : 20px;min-width:25vw;">
                    @if (($game->rating !== 0 && $game->rating !== 3 && $game->rating !== 7 && $game->rating !== 12 && $game->rating !== 16 && $game->rating !== 18) || $game->rating === 0)
                        <option value="0" selected="selected">0</option>
                        <option value="3" >3</option>
                        <option value="7" >7</option>
                        <option value="12" >12</option>
                        <option value="16" >16</option>
                        <option value="18" >18</option>
                    @elseif ($game->rating === 3)
                        <option value="0">0</option>
                        <option value="3" selected="selected">3</option>
                        <option value="7" >7</option>
                        <option value="12" >12</option>
                        <option value="16" >16</option>
                        <option value="18" >18</option>
                    @elseif ($game->rating === 7)
                        <option value="0">0</option>
                        <option value="3" >3</option>
                        <option value="7" selected="selected">7</option>
                        <option value="12" >12</option>
                        <option value="16" >16</option>
                        <option value="18" >18</option>
                    @elseif ($game->rating === 12)
                        <option value="0">0</option>
                        <option value="3" >3</option>
                        <option value="7" >7</option>
                        <option value="12" selected="selected">12</option>
                        <option value="16" >16</option>
                        <option value="18" >18</option>
                    @elseif ($game->rating === 16)
                        <option value="0">0</option>
                        <option value="3" >3</option>
                        <option value="7" >7</option>
                        <option value="12" >12</option>
                        <option value="16" selected="selected">16</option>
                        <option value="18" >18</option>
                    @elseif ($game->rating === 18)
                        <option value="0">0</option>
                        <option value="3" >3</option>
                        <option value="7" >7</option>
                        <option value="12" >12</option>
                        <option value="16" >16</option>
                        <option value="18" selected="selected">18</option>
                    @endif

                    <option value="1">Add new genre</option>

                </select>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div id="newcont" style="display: none;">
                <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                    <label for="genrename" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">New Game Genre</label>
                    <input type="text" name="genrename" id="genrename" style="border : 2px black solid;height : 20px;min-width:25vw;">
                </div>
                <div style="margin: 1vw 22.8vw">
                    <hr style="color: rgb(120, 120, 120)">
                </div>
            </div>


            <div style="display: flex; justify-content:flex-end; width :70%;">
                <button style="border:0; background-color:rgb(40, 103, 248); width:10vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Update Game</b> </button>
            </div>
        </form>
        @if(Session::has('error'))
            <h5 style="color:red; text-align:center">{{Session::get('error')}}</h5>
        @endif
        @if($errors->any())
            <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
        @endif
    </div>

@endsection
