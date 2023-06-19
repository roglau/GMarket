@extends('layout.template')
@section('content')
    <div class="contentc">

        <div style="display: flex; justify-content:center; width :55%; margin-top:20px;">
            <h2>Update Genre</h2>
        </div>

        <form action="/updategenre/{{$genre->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="genrename" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Game Genre</label>
                <input type="text" name="genrename" id="genrename" value="{{$genre->genrename}}" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:flex-end; width :70%;">
                <button style="border:0; background-color:rgb(40, 103, 248); width:10vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Update Genre</b> </button>
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
