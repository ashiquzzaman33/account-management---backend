var accounts;
$(document).ready(function(){
	/*
	*	ledger report
	*/
	$('.datepicker').datepicker({
	    todayHighlight	: 	true,
		format			:	"dd-mm-yyyy"
	});

	$.get('get/accounts', function(data){
		accounts = JSON.parse(data);
		var count = 0;
		for(i in accounts){
			if(count == 0){
				// do nothing to avoid root account
			}else{
				$("#ledger_select").append("<option value=\""+ accounts[i].id +"\">"+ accounts[i].name +"</option>");
			}
			count++;
			
		}
	});

	$("#show_ledger_report").click(function(){
		$("#ledger_report").html('<tr><th>Date</th><th>Ref</th><th>Account</th><th>Narration</th><th>Dr</th><th>Cr</th><th>Balance</th></tr>');
		var account_id = $("#ledger_select").val();
		var start = $("#start_date").val();
		start = start[6] + start[7] + start[8] + start[9] +"-"+ start[3] + start[4] +"-" + start[0] + start[1];
		var end = $("#end_date").val();
		end = end[6] + end[7] + end[8] + end[9] +"-"+ end[3] + end[4] +"-" + end[0] + end[1];
		$.get("report/ledger", {account_id:account_id,start_date:start,end_date:end}, function(data){
			var report_data = JSON.parse(data);
			for(i in report_data){
				var date = report_data[i].date;
				date = date[8] + date[9] + '-' + date[5] + date[6] + '-' + date[0] + date[1] + date[2] + date[3];
				var ref = report_data[i].voucher_id;
				var account = getAccountName(report_data[i].against_account_id);
				var narration = report_data[i].remark;
				var dr = report_data[i].dr;
				var cr = report_data[i].cr;
				var balance = report_data[i].balance;
				$("#ledger_report").append('<tr><td>'+ date +'</td><td>'+ ref +'</td><td>'+ account +'</td><td>'+ narration +'</td><td>'+ dr * 1 +'</td><td>'+ cr * 1 +'</td><td>'+ balance * 1 +'</td></tr>');
			}
		});
	});


	/*
	*	balance sheet
	*/
	$.get('/acc/public/report/trialbalance', function(data){
		var tb = JSON.parse(data);
		var counter = 0;
		for(var i in tb){
			if(counter == 0){

			}else{
				if(tb[i].balance < 0){
					$("#trial_balance_report").append('<tr><td>'+ tb[i].name +'</td><td>-</td><td>'+ tb[i].balance * -1 +'</td></tr>');
				}else{
					if(tb[i].balance == 0){
						$("#trial_balance_report").append('<tr><td>'+ tb[i].name +'</td><td>-</td><td>-</td></tr>');
					}else{
						$("#trial_balance_report").append('<tr><td>'+ tb[i].name +'</td><td>'+ tb[i].balance * 1 +'</td><td>-</td></tr>');
					}
					
				}
			}
			counter++;
		}
	});

	/*
	*	party report
	*/

	$('#show_party_report').click(function(){
		$("#party_report").html('<tr><th>Name</th><th>Opening Balance</th><th>Total Dr</th><th>Total Cr</th><th>Closing Balance</th></tr>');
		var start = $("#party_start_date").val();
		start = start[6] + start[7] + start[8] + start[9] +"-"+ start[3] + start[4] +"-" + start[0] + start[1];
		var end = $("#party_end_date").val();
		end = end[6] + end[7] + end[8] + end[9] +"-"+ end[3] + end[4] +"-" + end[0] + end[1];

		$.get('/acc/public/report/party/all?start_date='+ start +'&end_date='+ end, function(data){
			var report = JSON.parse(data);
			for(i in report){
				var name = report[i].party_name;
				var ob = report[i].opening_balance * 1;
				var dr = report[i].dr * 1;
				var cr = report[i].cr * 1;
				var balance = report[i].balance * 1;

				$("#party_report").append('<tr><td>'+ name +'</td><td>'+ ob +'</td><td>'+ dr +'</td><td>'+ cr +'</td><td>'+ balance +'</td></tr>');
			}
		});
	});



});

function getAccountName(id){
	for(var i in accounts){
		if(accounts[i].id == id){
			return accounts[i].name;
		}
	}
	return '';
}
