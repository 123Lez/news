@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card menu-container">
        <div class="home-menu-container" title="Home">
            <a href="/menu">
                <li class="fa fa-home fa-2x"></li><span>Home</span>
            </a>
        </div>
        <div class="menuBar-menu-container" title="Menu">
            <a href="/menu">
                <li class="fa fa-bars fa-2x"></li><span>Menu</span>
            </a>
            
        </div>
         <div class="trending-menu-container" title="Trending">
            <li class="fa fa-fire fa-2x"></li><span>Trending</span>
            
        </div>
         <div class="subscription-menu-container" title="Subscriptions">
            <li class="fa fa-newspaper-o fa-2x"></li><span>Subscriptions</span>
            
        </div>
        
    </div>
    <!-- <center>
        <div class="card" style="width: 45%;">
            <p id='viewer'></p>
            
            <div class="img-container">
                <img src="img/img1.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img2.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img3.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>


                <img src="img/img4.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img5.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img6.png" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img7.png" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img8.jpg" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>

                <img src="img/img9.png" >
                <p>dsfdsfdsfdsfdsfsdfsdfdsfdsfsdfsdfdsfdsfsd</p>
            </div>
            
        </div>
    </center>    -->      

    <center>
        <div class="card" style="width: 50%;">
            <div class="img-container">
                @foreach($data as $article)
                <div class="article-hover">
                    <a href="articleview/{{$article->id}}">
                        <img src="{{$article->top_image}}">
                        <p class="article-title">{{$article->title}}</p>
                    </a>
                    {{$article->all_images}}
                </div>
                @endforeach
                
            </div>
            <div class="pagination-tab">{{$data->links()}}</div>
        </div>
    </center>  
@endsection
