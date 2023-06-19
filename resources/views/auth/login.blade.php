@extends('layout.template')
@section('content')

    <div class="contentc">
        <div class="logintitle" style="text-align: center; padding-top : 30px;">
            <h2><span style="color:red">G</span>Market</h2>
            <br>
            <h3>Sign in to your account</h3>
        </div>

        <div style="display : flex; justify-content : center; background: rgb(230, 230, 230);">
            <form action="" method="POST" style="display : flex; flex-direction:column; background : white; padding : 15px; gap : 20px; margin:2em; width:30vw;">
                {{csrf_field()}}
                <label for="email" style="font-weight : bold">Email</label>
                <input value="{{ Cookie::get('email') }}" type="text" name="email" id="email" style="border : 2px black solid; border-radius : 3%; padding 10px; height : 25px; width : 95%">
                <label for="password" style="font-weight : bold">Password</label>
                <input value="{{ Cookie::get('password') }}" type="password" name="password" id="password" style="border : 2px black solid; border-radius : 3%; padding 10px; height : 25px; width : 95%">
                <div class="remember" style="display:flex; gap:5px;">
                    <input type="checkbox" name="remember" id="remember">Remember me
                </div>
                @if($errors->any())
                <h5 style="color:red; text-align:center">{{$errors->first()}}</h5>
                @else
                <br>
                @endif
                <button style="font-weight : bold; padding : 10px;">Sign in</button>
            </form>
        </div>
    </div>
@endsection
