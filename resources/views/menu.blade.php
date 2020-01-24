@extends('layouts.app')

@section('content')

@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card menu-container">
        <div class="home-menu-container" title="Home">
        	<a href="{{ url('/home') }}">
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
	<center>
		<div class="card" style="width: 50%;" id="source_article">
			<div class="container">
				<div class="d-flex flex-row flex-wrap justify-content-left bd-highlight mb-3 logo-container">
					<div class="p-2 bd-highlight" title="BBC" onclick="fetchSourceArticle('BBC')"> 
							<img src="img/sources/bbc_news_logo.png" class="logo-img">
					</div>

					<div class="p-2 bd-highlight" title="CNN" onclick="fetchSourceArticle('CNN')">
						<a href="view/CNN">
							<img src="img/sources/cnn_logo_social.jpg" class="logo-img">
						</a>
					</div>

					<div class="p-2 bd-highlight" title="eNCA" onclick="fetchSourceArticle('eNCA')">
							<img src="img/sources/eNCA_logo.svg" class="logo-img">
					</div>

					<div class="p-2 bd-highlight" title="SuperSport" onclick="fetchSourceArticle('SuperSport')">
							<img src="img/sources/super-sport-logo.png" class="superSport_logo">
					</div>

				</div>
					
			</div>
		</div>
	</center>
@endsection