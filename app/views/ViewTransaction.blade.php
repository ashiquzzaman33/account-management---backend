@extends('main')

@section('content')
@include('navbar')

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<label for="select_date">Select Date</label><br>
				<input id="date" class="datepicker" type="text" placeholder="Select date">
			</div>
			<div class="col-md-2">
				<br>
				<button class="btn btn-primary" id="show_transaction">Show</button>
			</div>
		</div>

		<div class="row">
			<br>
			<div class="col-md-12">
				<table class="table table-bordered" id="transaction_report">
					<tr>
						<th>SL.</th>
						<th>Account</th>
						<th>Narration</th>
						<th>Dr</th>
						<th>Cr</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<br><br><br><br><br><br><br>

	<script type="text/javascript">
	
		var accounts;
		$.get('/acc/public/get/accounts', function(data){
			accounts = JSON.parse(data);
		});

		$("#show_transaction").click(function(){
			$("#transaction_report").html('<tr><th>SL.</th><th>Account</th><th>Narration</th><th>Dr</th><th>Cr</th></tr>');
			var date = $("#date").val();
			date = date[6] + date[7] + date[8] + date[9] + '-' + date[3] + date[4] + '-' + date[0] + date[1];
			$.get('/acc/public/get/transaction?date=' + date, function(data){
				var transaction = JSON.parse(data);
				var counter = 1;
				for(var i in transaction){
					$("#transaction_report").append('<tr><td>'+ counter +'</td><td>'+ getNameById(transaction[i].account_id) +'</td><td>'+ transaction[i].narration +'</td><td>'+ parseFloat(transaction[i].dr) +'</td><td>'+ parseFloat(transaction[i].cr) +'</td></tr>');
					counter++;
				}
				if(counter == 1){
					$("#transaction_report").html('<h2>No Transaction Found On '+ $("#date").val() +'</h2>');
				}
			});
		});

		function getNameById(id){
			for(var i in accounts){
				if(accounts[i].id == id){
					return accounts[i].name;
				}
			}
		}


	</script>

@stop