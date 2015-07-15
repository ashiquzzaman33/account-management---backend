@extends('main_layout')

@section('container')
	
	<h2>View Party</h2><hr>
	
	@foreach($party as $p)
		<div class="single_party" style="width=100%;height:200px" >
			<div class="image" style="width:40%;float:left">
				<img src="{{ URL::to('/') . '/' .$p->image_url }}" alt="" style="max-width:90%;height:200px">
			</div>
			<div class="details" style="width:60%;float:left">
				<b>Name:</b> {{ $p->name }} <br>
				<b>Address:</b> {{ $p->address }}<br>
				<b>Mobile:</b>{{ $p->mobile }}<br>
				<b>Email:</b> {{ $p->email }}<br>
				<b>Company name:</b> {{ $p->company_name }}<br>
				<b>Company address:</b> {{ $p->company_address }} <br>
			</div>
		</div><hr>
	@endforeach


@stop