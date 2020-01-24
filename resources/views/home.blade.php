@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <ul class="card menu-container">
        <div class="home-menu-container" title="Home">
            <a href="{{ url('/home') }}">
                <li class="fa fa-home fa-2x"></li><span>Home</span>
            </a>
        </div>
        <div class="menuBar-menu-container" title="Menu">
            <a href="{{ url('/menu') }}">
                <li class="fa fa-bars fa-2x"></li><span>Menu</span>
            </a>
            
        </div>
         <div class="trending-menu-container" title="Trending">
            <li class="fa fa-fire fa-2x"></li><span>Trending</span>
            
        </div>
         <div class="subscription-menu-container" title="Subscriptions">
            <li class="fa fa-newspaper-o fa-2x"></li><span>Subscriptions</span>
            
        </div>
        
    </ul>
    <center>
        <!-- Vertical -->
        <!-- <div class="card" style="width: 50%;">
            <div class="img-container">
                @foreach($data as $article)
                <div class="article-hover">
                    <a href="articleview/{{$article->id}}">
                        <img src="{{$article->top_image}}">
                        <p class="article-title">{{$article->title}}</p>
                    </a>
                </div>
                @endforeach
                
            </div>
            <div class="pagination-tab">{{$data->links()}}</div>
        </div> -->
        <!-- Vertical -->

    <p id='viewer'></p>
        <div class="container">
            <div class="d-flex flex-row flex-wrap justify-content-left bd-highlight mb-3">
                
            @foreach($data as $article)
                <div class="p-2 bd-highlight">
                    <div class="card img-container" id="img-holder">
                        <a href="{{$article->article_url}}" target="_blank">
                            <img src="{{$article->top_image}}">
                            <span class="article-title">{{$article->title}}</span>
                        </a>
                        
                    </div>
                </div>
                <br>
                
            @endforeach
            </div>
        </div>
        <!-- <div class="pagination-tab">{{$data->onEachSide(1)->links()}}</div> -->
        <div class="page-pagination">{{$data->onEachSide(1)->links()}}</div>
    </center>  
@endsection
