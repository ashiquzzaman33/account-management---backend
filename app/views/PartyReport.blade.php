@extends('main')

@section('content')
@include('navbar')

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<label for="party_start_date">Select Start Date</label><br>
				<input id="party_start_date" class="datepicker" type="text" placeholder="Select start date"><br><br>
			</div>
			<div class="col-md-3">
				<label for="party_end_date">Select End Date</label><br>
				<input class="datepicker" type="text" placeholder="Select end date" id="party_end_date"><br><br>
			</div>
			<div class="col-md-1">
				<br><button class="btn btn-primary" id="show_party_report">Show Report</button>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" id="party_report">
					<tr>
						<th>Name</th>
						<th>Opening Balance</th>
						<th>Total Dr</th>
						<th>Total Cr</th>
						<th>Closing Balance</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<br><br><br><br><br><br><br>

@stop