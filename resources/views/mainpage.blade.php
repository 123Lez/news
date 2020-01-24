@extends('layouts.app')
@section('content')
	<section class="articles-show infinite-scroll" data-next-page="{{ $data->nextPageUrl() }}">
		<center>
			<!-- Vertical-->
			<!-- <div class="card" style="width: 50%;">
				<p id='viewer'></p>
				<div class="container">
					@foreach($data as $article)
						<div class="img-container">
							<a href="">
								<img src="{{$article->top_image}}">
							</a>
						</div>
						{{$article->title}}
					@endforeach
					
				</div> -->
				<!-- Vertical-->

				<!-- Tiles-->
				<div class="lds-ring" style="display: none;" id="app-loader"><div></div><div></div><div></div><div></div></div>
				<div id="app-container">
					<div class="slideShow-container">
						@php
							$slide_counter = 0;
							foreach($data as $article)
							{
								$slide_counter++;
								if($slide_counter <= 8)
								{
									echo "<div class='mySlides fade1'>".
									 	 "<div class='numbertext'> $slide_counter/8 </div>".
									 	 "<img src='$article->top_image' style='width: 100%'>".
									 	 "<div class='text'  style='font-size: 19px;'>$article->title</div>".
									 	 "</div>";
									
								}	
								else
								{
									break;
								}
								
							}
							
						@endphp
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>

					</div>

					<div style="text-align: center;">
						@for($dots_show=1; $dots_show<=8; $dots_show++)
							<span class="dot" onclick="currentSlide({{$dots_show}})"></span>
						@endfor
						
					</div> 
					<div class="sources_container justify-content-center">
						<div class="logo-holder">
							<div class="d-flex flex-row flex-wrap justify-content-left bd-highlight mb-3 logo-container">
								<!-- <div class="p-2 bd-highlight" title="BBC" onclick="fetchSourceArticle('BBC')"> 
										<img src="img/sources/bbc_news_logo.png" class="logo-img">
								</div> -->
								<div class="p-2 bd-highlight" title="BBC"> 
									<a href="{{url('/show_source?source=BBC')}}">
										<img src="img/sources/bbc_news_logo.png" class="logo-img">
									</a>
								</div>

								<div class="p-2 bd-highlight" title="CNN">
									<a href="{{url('/show_source?source=CNN')}}">
										<img src="img/sources/cnn_logo_social.jpg" class="logo-img">
									</a>
								</div>

								<div class="p-2 bd-highlight" title="eNCA">
									<a href="{{url('/show_source?source=eNCA')}}">
										<img src="img/sources/eNCA_logo.svg" class="logo-img">
									</a>
								</div>

								<div class="p-2 bd-highlight" title="SuperSport">
									<a href="{{url('/show_source?source=SuperSport')}}">
										<img src="img/sources/super-sport-logo.png" class="superSport_logo">
									</a>
								</div>

								<div class="p-2 bd-highlight" title="Zalebs">
									<a href="{{url('/show_source?source=Zalebs')}}">
										<img src="img/sources/Zalebs.png"  class="superSport_logo">
									</a>
								</div>
								<div class="p-2 bd-highlight" title="Espn">
									<a href="{{url('/show_source?source=ESPN')}}">
										<img src="img/sources/espn3.png" style="background-color: red;" class="logo-img">
									</a>
								</div>

							</div>
						</div>

					</div>

					<!-- Infinity Scroll -->
					<div class="infinite-scroll">
						<p id='viewer'></p>
						<div class="container">
							<div class="d-flex flex-row flex-wrap justify-content-left bd-highlight mb-3">
								
							@foreach($data as $article)
								<div class="p-2 bd-highlight holder">
									<div class="card img-container" id="img-holder">
										<a href="{{$article->article_url}}" target="_blank">
											<img src="{{$article->top_image}}">
											@php
												if(strlen($article->title) >= 45)
												{
													$article_title = substr($article->title,0,45).' ...';
												}
												else
												{
													$article_title = $article->title;
												}
											@endphp
											<span class="article-title">{{$article_title}}</span>
							
										</a>
										
									</div>
								</div>
								<br>
								
							@endforeach
							</div>
						</div>



						<!-- Tiles-->

						<!-- <div class="img-container">
						<div class="img-container">
							@foreach($data as $article)
							<div class="article-hover">
								<a href="articleview/{{$article->id}}">
									<img src="{{$article->top_image}}">
									<p class="article-title">{{$article->title}}</p>
								</a>
							</div>
							@endforeach
							
						</div-->
						
						<!-- <div class="pagination-tab">{{$data->links()}}</div> -->
						<center>{{$data->links()}}</center>
					</div>
				</div>
		</center>
	</section>
@endsection