@extends('main')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<label for="select_ledger">Select Ledger</label><br>
				<select id="ledger_select" name="" id="">
					<option value="">Select a Ledger</option>
				</select><br><br>
			</div>
			<div class="col-md-3">
				<label for="select_ledger">Select Start Date</label><br>
				<input id="start_date" class="datepicker" type="text" placeholder="Select start date"><br><br>
			</div>
			<div class="col-md-3">
				<label for="select_ledger">Select End Date</label><br>
				<input class="datepicker" type="text" placeholder="Select end date" id="end_date"><br><br>
			</div>
			<div class="col-md-1">
				<br><button class="btn btn-primary" id="show_ledger_report">Show Report</button>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" id="ledger_report">
					<tr>
						<th>Date</th>
						<th>Ref</th>
						<th>Account</th>
						<th>Narration</th>
						<th>Dr</th>
						<th>Cr</th>
						<th>Balance</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br>
@stop