@extends('layout')
@section('content')
	<ul>
		@foreach($users as $user)
			<li>{{ $user->email }}</li>
		@endforeach
	</ul>
@stop