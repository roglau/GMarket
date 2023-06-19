@extends('layout.template')
@section('content')

    <div class="contentc">
        <div class="logintitle" style="text-align: center; padding-top : 30px;">
            <h2><span style="color:red">G</span>Market</h2>
            <br>
            <h3>Sign up your account</h3>
        </div>

        <div style="display : flex; justify-content : center; background: rgb(230, 230, 230);">
            <form action="" method="POST" style="display : flex; flex-direction:column; background : white; padding : 15px; gap : 20px; margin-top: 5vh; width:30vw; margin:2em ;">
                {{csrf_field()}}
                <label for="name" style="font-weight : bold">Name</label>
                <input type="text" name="name" id="name" style="border : 2px black solid; border-radius : 3%; padding 10px; height : 25px; width : 95%">
                <label for="email" style="font-weight : bold">Email</label>
                <input type="text" name="email" id="email" style="border : 2px black solid; border-radius : 3%; padding 10px; height : 25px; width : 95%">
                <label for="password" style="font-weight : bold">Password</label>
                <input type="password" name="password" id="password" style="border : 2px black solid; border-radius : 3%; padding 10px; height : 25px; width : 95%">
                <label for="gender" style="font-weight : bold">Gender</label>
                <div style="display: flex; gap:10px;">
                    <input type="radio" name="gender" id="male" value="male">Male
                    <input type="radio" name="gender" id="female" value="female">Female
                </div>
                <label for="dob" style="font-weight : bold">Date of Birth</label>
                <input type="date" name="dob" id="dob" max="{{$now}}" style="height : 25px;" >

                @if($errors->any())
                <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
                @else
                <br>
                @endif
                <button style="font-weight : bold; padding : 10px;">Sign up</button>
            </form>
        </div>
    </div>
@endsection
