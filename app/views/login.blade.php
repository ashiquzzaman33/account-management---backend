@extends('main')

@section('content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="{{ URL::route('postLogin') }}" method="post">
				<h2>Login</h2>
				<hr>
				<label for="username" class="col-md-4">Username</label>
				<input type="text" id="username" name="username" class="col-md-8">
				<br><br>
				<label for="password" class="col-md-4">Password</label>
				<input type="password" id="password" name="password" class="col-md-8">
				<br><br>
				<input type="submit" value="Login" class="col-md-2 col-md-offset-10 btn btn-primary">
			</form>
		</div>
	</div>

@stop