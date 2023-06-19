@extends('layout.template')
@section('content')
    <div class="contentc">
        @if (Session::has('success'))
            <div style="display: flex; justify-content:center; align-items:center; gap:10px; margin:5px;">
                <img src="{{Storage::url('/images/check.png')}}" alt="" class="profileicon">
                <p style="font-size:18px">{{Session::get('success')}}</p>
            </div>
        @endif
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index: 0">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="display : flex;justify-content: center;">

            <div class="item active">
                <img src="{{ Storage::url('/images/elden.jpg')}}" alt="New York" style="width:50em;">
                <div class="carousel-caption d-none d-md-block">
                    <h2 style="margin-bottom: 50px;">The Official Game Zone</h2>
                    <p style="margin-bottom: 30px;">Welcome to our online game store! Whether you're a casual or hardcore gamer, we've got everything you need to play, compete, and win.</p>

                    <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin-bottom:10px; border-radius:5%;"> <b style="color: white">Shop Now</b> </button>

                </div>
            </div>

            <div class="item">
                <img src="{{ Storage::url('/images/fifa.jpg')}}" alt="Chicago" style="width:50em;">
                <div class="carousel-caption d-none d-md-block">
                    <h2 style="margin-bottom: 50px;">The Official Game Zone</h2>
                    <p style="margin-bottom: 30px;">Welcome to our online game store! Whether you're a casual or hardcore gamer, we've got everything you need to play, compete, and win.</p>

                    <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin-bottom:10px; border-radius:5%;"> <b style="color: white">Shop Now</b> </button>

                </div>
            </div>

            <div class="item">

                <img src="{{ Storage::url('/images/gta5.jpg')}}" alt="Los Angeles" style="width:50em;">
                <div class="carousel-caption d-none d-md-block">
                    <h2 style="margin-bottom: 50px;">The Official Game Zone</h2>
                    <p style="margin-bottom: 30px;">Welcome to our online game store! Whether you're a casual or hardcore gamer, we've got everything you need to play, compete, and win.</p>

                    <button style="border:0; background-color:rgb(40, 103, 248); width:6vw; height:6vh; cursor: pointer; margin-bottom:10px; border-radius:5%;"> <b style="color: white">Subscribe Now</b> </button>

                </div>
            </div>

        </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        <p style="font-size: 24px; margin-left:4em; margin-top:0.5em;">Recommended Games For You</p>
        <hr style="border-color:black; width:87.5%;  margin:0 auto;">
        <div class="list">
            @foreach ($games as $game)
                <div class="card">
                    <a href="{{'detail/'.$game->id}}">
                    <img src="{{Storage::url($game->image)}}" alt="" style="width: 13em; height:11em">
                    <p style="white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis; text-align:center;">{{$game->title}}</p>
                    @php
                        $genre = DB::table('genres')->find($game->genreid)
                    @endphp
                    <div style="display: flex; justify-content:center; align-items:center;">
                        <p style="margin:5px; padding : 5px; color:green; background:rgb(176, 250, 176);">{{$genre->genrename}}</p>
                    </div>
                    <hr style="border: 1px grey solid; margin:5px;">
                    @if ($game->price == 0)
                      <h4>{{"Free"}}</h4>
                    @else
                     <h4>$ {{$game->price}}</h4>
                    @endif
                    </a>
                </div>
            @endforeach
        </div>

        <div class="botcontainer">
            <div class="showres">
                @php
                    $s = 1;
                    $end = 10;
                @endphp

                @if ($games->currentPage()==$games->lastPage())
                    @php
                        $s = $s + 10 * ($games->currentPage()-1);
                        $end = $games->total();

                    @endphp
                @elseif ($games->currentPage()>1)
                    @php
                        $s = $s + 10 * ($games->currentPage()-1);
                        $end = $s+9;

                    @endphp
                @endif

                Showing {{$s}} to {{$end}} of {{$games->total()}}
            </div>
            <div class="pagination">
                @if ($games->currentPage()!=1)
                    <a class="" href="{{$games->previousPageUrl()}}">
                        &laquo;
                    </a>
                @endif

                @php
                    $ctr = 0;
                    $x = 1;
                @endphp

                @if ($games->currentPage() == $games->lastPage() && $games->currentPage() != 1)
                    @php
                        $x = $games->currentPage()-2;
                    @endphp
                @elseif ($games->currentPage()!=1)
                    @php
                        $x = $games->currentPage()-1;
                    @endphp
                @endif

                @for ($i = $x; $i <= $games->lastPage(); $i++)
                    @php
                        $ctr++;
                    @endphp

                    @if ($i==$games->currentPage())
                        <a href="#" class="now">{{$i}}</a>
                    @else
                        <a href="{{$games->url($i)}}">{{$i}}</a>
                    @endif

                    @if ($ctr==3)
                        @break
                    @endif
                @endfor

                @if ($games->currentPage()!=$games->lastPage())
                    <a href="{{$games->nextPageUrl()}}">&raquo;</a>
                @endif

            </div>
        </div>




    </div>
@endsection
