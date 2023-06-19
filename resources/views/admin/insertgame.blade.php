@extends('layout.template')
@section('content')
    <div class="contentc">

        <div style="display: flex; justify-content:center; width :55%; margin-top:20px;">
            <h2>Add Game</h2>
        </div>

        <form action="/insertgame" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="title" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Title</label>
                <input type="text" name="title" id="title" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw;">
                <label for="image" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Photo</label>
                <div style="min-width: 25vw; display:flex; justify-content:space-between">
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="desc" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">Game Description</label>
                <textarea name="desc" id="desc" style="border : 2px black solid;height : 30px;min-width:25vw;"></textarea>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="price" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Price</label>
                <input type="number" name="price" id="price" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="genre" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Genre</label>
                <select name="genre" id="genre" onchange="newGenre(this);" style="border : 2px black solid;height : 20px;min-width:25vw;">
                    @php
                        $ctr=0;
                        @endphp
                    @foreach ($genres as $genre)
                        @php
                            $ctr++;
                        @endphp
                        @if ($ctr == 1)
                            <option value={{$genre->genrename}} selected="selected">{{$genre->genrename}}</option>
                        @else
                            <option value={{$genre->genrename}} >{{$genre->genrename}}</option>
                        @endif
                    @endforeach
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

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="rating" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">PEGI Rating</label>
                <select name="rating" id="rating" style="border : 2px black solid;height : 20px;min-width:25vw;">
                        <option value="0" selected="selected">0</option>
                        <option value="3" >3</option>
                        <option value="7" >7</option>
                        <option value="12" >12</option>
                        <option value="16" >16</option>
                        <option value="18" >18</option>
                </select>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:flex-end; width :70%;">
                <button style="border:0; background-color:rgb(40, 103, 248); width:10vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Add Game</b> </button>
            </div>
        </form>
        @if(Session::has('error'))
            <h5 style="color:red; text-align:center">{{Session::get('error')}}</h5>
        @endif

        @if($errors->any())
            <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
        @endif
    </div>

    <script>

    </script>

@endsection
