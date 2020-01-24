@extends('layouts.app')
@section('content')
<center>
	<div class="lds-ring" style="display: none;" id="app-loader"><div></div><div></div><div></div><div></div></div>
	<div id="app-container">
		<div class="infinite-scroll">
			@if(count($search_result) > 0)
				@foreach($search_result as $result)
					<div class="p-2 bd-highlight holder">
						<div class="card img-container" id="img-holder">
						    <div class="article-hover">
								<a href="{{$result->article_url}}" target="_blank">
									<img src="{{$result->top_image}}">
									@php
										if(strlen($result->title) >= 45)
										{
											$article_title = substr($result->title,0,45).' ...';
										}
										else
										{
											$article_title = $result->title;
										}
									@endphp
									<span class="article-title">{{$article_title}}</span>
								</a>
							</div>
						</div>
					</div>
				@endforeach
				@else
					<div class="p-2 bd-highlight holder">
						
							 No data found
						
					</div>
				@endif

			<center>{{$search_result->appends(request()->query())->links()}}</center>
		</div>
	</div>
	
</center>
@endsection