@extends('main')

@section('content')
@include('navbar')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" id="trial_balance_report">
					<tr>
						<th>Account Name</th>
						<th>Dr</th>
						<th>Cr</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
@stop