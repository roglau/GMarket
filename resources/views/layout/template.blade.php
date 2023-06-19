<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game SLot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        *{
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        nav{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            background : white;
            width: 100%;
            height: 60px;
            position: fixed;
            z-index: 2;
            top: 0;
            padding: 5px;
        }

        a{
            text-decoration: none;
            color: black;
            font-size: 1.3em;
        }

        .searchicon{
            width: 25px;
            height: 25px;
            float: left;
        }

        .profileicon{
            width: 25px; height: 25px; border-radius:50%
        }

        .profile:hover .profiledropdown{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .profiledropdown{
            display: none;
            position: absolute;
            background-color: white;
            min-width: 12vw;
            transform: translateX(-90%);
            z-index: 3;
        }

        .profiledropdown a{
            margin: 5%;
        }

        .profiledropdown a:hover{
            opacity: 40%;
        }

        .searchbtn{
            background: none;
            border: none;
            cursor: pointer;
        }

        .searchtext{
            border : none;
            width: 208px;
        }

        .right{
            display: flex;
            gap: 30px;
            padding: 15px;
        }

        .searchbox{
            border: 1px black solid;
            display: flex;
            width: 250px;
            height: 35px;
            justify-content: center;
        }

        .contentc{
            min-height: 95vh;
            background: rgb(230, 230, 230);
            padding-top: 80px;
            display: flex;
            flex-direction: column;
        }

        .list{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        a:hover{
            text-decoration: none;
        }

        .card{
            display: flex;
            flex-direction: column;
            text-align: center;
            border-radius: 10px;
            background: white;
            padding: 5px;
            width: 18em;
            height: 24em;
        }

        .card img{
            border-radius: 50%;
        }

        .botcontainer{
            display: flex;
            justify-content: space-around;
            gap: 50%;
            align-items: center;
            padding: 10px;
        }

        .pagination{
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .pagination a{
            text-decoration: none;
            color: black;
            width: 30px;
            border: 1px solid rgb(183, 182, 182);
            text-align: center;
            background: white;
        }

        .pagination a.now{
            background-color: rgb(83, 83, 248);
            color: white;
        }

        .pagination a:hover:not(.now) {
            opacity: 60%;
        }

        .detailcon{
            min-height: 85vh;
            background: rgb(230, 230, 230);
            padding-top: 80px;
            display: flex;
            justify-content: center;
        }

        .details{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            width: 80vw;
            height: 80vh;
            border-radius: 2%;
        }

        .activepage{
            border-bottom: 1px grey solid;
            text-decoration: none; color:grey;
        }

        footer{
            width: 100%;
            background: white;
            height: 3em;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.3em;
        }
    </style>

</head>
<body>
    <nav>

        <a href="/" style="padding:5px;"><b> <span style="color:red">G</span>Market</b></a>
        @auth
            @if (Auth::user()->role=='admin')
                <div style="display: flex; gap:20px; font-weight:bold;">
                    @if (Route::getCurrentRoute()->getName() === 'managegame')
                        <a href="/managegame" class="activepage">Manage Game</a>
                        <a href="/managegenre" style="text-decoration: none; color:grey;">Manage Game Genre</a>
                    @elseif(Route::getCurrentRoute()->getName() === 'managegenre')
                        <a href="/managegame" style="text-decoration: none; color:grey;">Manage Game</a>
                        <a href="/managegenre" class="activepage">Manage Game Genre</a>
                    @else
                        <a href="/managegame" style="text-decoration: none; color:grey;">Manage Game</a>
                        <a href="/managegenre" style="text-decoration: none; color:grey;">Manage Game Genre</a>
                    @endif

                </div>
            @endif
        @endauth
        <form action="" class="searchbox">
            <button type="submit" class="searchbtn">
                <img src="{{Storage::url('/images/search.png')}}" class="searchicon" alt="">
            </button>
            <input type="text" name='search' placeholder="Search Games" class="searchtext">
        </form>
        @auth
            <div class="right">
                <a href="/forum">
                    <img src="{{Storage::url('/images/forum.png')}}" class="searchicon" alt="">
                </a>
                <a href="/cart">
                    <img src="{{Storage::url('/images/cart.png')}}" class="searchicon" alt="">
                </a>

                <div class="profile">
                    <img src="{{Storage::url(auth()->user()->image)}}" class="profileicon" alt="">
                    <div class="profiledropdown">
                        <p style="font-size: 1.3em; margin:5%;">Hi, {{Auth::user()->name}}</p>
                        <hr style="border: 1px grey solid; width:90%; margin:5%;">
                        <a href="/profile">Your Profile</a>
                        <a href="/transaction">Transaction History</a>
                        <a href="/logout">Sign out</a>
                    </div>
                </div>
            </div>
        @else
            <div class="right">
                <a href="/login"> <b>Sign in</b></a>
                <a href="/register"> <b>Sign up</b> </a>
            </div>
        @endauth
    </nav>

    @yield('content')

    <footer>
        &copy;January 2023
    </footer>
</body>
    <script>
        function newGenre(e){
            document.getElementById('newcont').style.display = e.value == 1 ? 'block' : 'none';
        }
    </script>
</html>

