@extends('layouts.app')
@section('content')
	<center>
		<div class="card" style="width: 60%;">
			@foreach($articles as $article)
			@if($article->authors !="NULL")
			<span class="author-title">By {{$article->authors}}</span>
			@endif
			@if($article->publish !="NULL")
			<span class="author-title">{{$article->publish}}</span>
			@endif
			<br>
			<div class="slide-fade">
				
				<img src="{{$article->top_image}}" class="article-view_img">
				<p class="article-headline">{{$article->title}}</p>
			</div>
			<div class="d-flex flex-row flex-wrap justify-content-left bd-highlight mb-3">
				<div class="article-story">
					<div class="row">
						<div class="col-md-10">
							{{$article->article_text}}
							<a href="{{$article->article_url}}">Read more</a>
						</div>
					</div>
				</div>

			</div>
			@endforeach
		
			
		</div>
	</center>
@endsection