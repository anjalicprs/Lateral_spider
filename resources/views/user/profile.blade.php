@extends('layouts.app')
<style type="text/css">
	.profile-img{
		max-width:300px;
		border: 5px solid #fff;
		border-radius: 50%;
		box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
	}
</style>
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<img class="profile-img" src="/uploads/avatars/{{ $user->Picture }}">
				<h1>{{ $user->name }}</h1>
				<h5>{{ $user->email }}</h5>
				<h5>{{ $user->dob }}</h5>
				<button class="btn btn-success">Follow</button>
			</div>
		</div>
	</div>
</div>
@endsection
