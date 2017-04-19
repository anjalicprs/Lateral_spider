@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
			@if($article->user_id == Auth::id())
				<div class="panel-heading">
					<span>
						USER id : {{ $article->id }}
					</span>
					<span class="pull-right">
						{{ $article->created_at->diffForHumans() }}
					</span>
					<a href="/articles/{{ $article->id }}/edit"><button class="btn btn-success" style="margin-left:100px;">Edit</button></a>
				</div>
				<div class="panel-body">
					{{ $article->content }}
				</div>
			@endif
			@if($article->user_id != Auth::id())
				<div class="panel-heading">
					<span>
						USER id : {{ $article->user_id }}
					</span>
					<span class="pull-right">
						{{ $article->created_at->diffForHumans() }}
					</span>
				</div>
				<div class="panel-body">
					{{ $article->content }}
				</div>
			@endif
			</div>
		</div>
	</div>
@endsection