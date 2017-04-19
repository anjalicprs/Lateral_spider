@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Article
				</div>
				<div class="panel-body">
				<form action="/articles/{{ $articles->id }}" method="POST">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
					<div class="form-group">
						<label for="content">
							Content
						</label>
						<textarea name="content" class="form-control">{{ $articles->content }}</textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="live" {{ $articles->live ==1 ? 'checked':''}}>
							Live
						</label>
					</div>
					<div class="form-group">
						<label for="post_on">
							Post on
						</label>
						<input type="datetime-local" value="{{ $articles->post_on->format('Y-m-d\TH:i:s') }}" name="post_on" class="form-control" />
					</div>
						<input type="submit" class="btn btn-success pull-right">
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection