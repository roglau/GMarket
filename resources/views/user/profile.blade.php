@extends('layout.template')
@section('content')
    <div style="min-height: 110vh;background: rgb(230, 230, 230);padding-top: 80px;display: flex;flex-direction: column;">
        <div style="display: flex; justify-content:center; width :55%; margin-top:20px;">
            <h2>Profile</h2>
        </div>

        <form action="/updateprofile" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="name" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Name</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw;">
                <label for="image" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Photo</label>
                <div style="min-width: 25vw; display:flex; justify-content:space-between">
                    <img src="{{Storage::url($user->image)}}" alt="" style="width: 25px; height: 25px; border-radius:50%">
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="email" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Email</label>
                <input type="text" name="email" id="email" value="{{$user->email}}" style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="gender" style="font-weight : bold; min-width:5vw; color:rgb(78, 78, 78)">Gender</label>
                <p style="height : 20px;min-width:25vw;">{{$user->gender}}</p>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="dob" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">Date of Birth</label>
                <p style="height : 20px;min-width:25vw;">{{$user->dob}}</p>
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            @if(Session::has('error'))
                <h5 style="color:red; text-align:center">{{Session::get('error')}}</h5>
            @endif

            @if($errors->any())
                <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
            @endif

            <div style="display: flex; justify-content:flex-end; width :70%;">
                <button style="border:0; background-color:rgb(40, 103, 248); width:10vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Update Profile</b> </button>
            </div>
        </form>

        <div style="display: flex; justify-content:center; width :55%; margin-top:20px;">
            <h2>Account</h2>
        </div>

        <form action="/updateaccount" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="oldpass" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">Old Password</label>
                <input type="password" name="oldpass" id="oldpass"  style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="password" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">New Password</label>
                <input type="password" name="password" id="password"  style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            <div style="display: flex; justify-content:space-evenly; align-items:center; min-width:50vw; margin-top: 30px;">
                <label for="confpassword" style="font-weight : bold; max-width:5vw; color:rgb(78, 78, 78)">Confirm Password</label>
                <input type="password" name="confpassword" id="confpassword"  style="border : 2px black solid;height : 20px;min-width:25vw;">
            </div>

            <div style="margin: 1vw 22.8vw">
                <hr style="color: rgb(120, 120, 120)">
            </div>

            @if(Session::has('error'))
                <h5 style="color:red; text-align:center">{{Session::get('error')}}</h5>
            @endif

            @if($errors->any())
                <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
            @endif

            <div style="display: flex; justify-content:flex-end; width :70%;">
                <button style="border:0; background-color:rgb(40, 103, 248); width:10vw; height:6vh; cursor: pointer; margin:10px; border-radius:5%;"> <b style="color: white">Update Account</b> </button>
            </div>
        </form>
    </div>
@endsection
