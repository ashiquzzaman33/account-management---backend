@extends('main_layout')
@section('container')

<div class="container">
	<h2>Create New User</h2>
	<hr>
	<form action="{{ URL::route('postCreateUsers') }}" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username">
		
		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password">

		<br><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password">

		<br><br>

		<label for="auth_password">Authorization Password:</label>
		<input type="password" name="auth_password">
		
		<h4>Set Permission</h4>
		<hr>
		<input type="checkbox" name="inventory" value="true">inventory <br>
		<input type="checkbox" name="project" value="true">Project <br>
		<input type="checkbox" name="lc" value="true">LC <br>
		<input type="checkbox" name="cnf" value="true"> C&F <br>
		<input type="checkbox" name="deposit_voucher" value="true">Deposit Voucher <br>
		<input type="checkbox" name="expense_voucher" value="true">Expense Voucher <br>
		<input type="checkbox" name="sell" value="true">Sell <br>
		<input type="checkbox" name="purchase" value="true">Purchase <br>
		<input type="checkbox" name="party_create" value="true">Party Create <br>
		<input type="checkbox" name="ledger_create" value="true">Ledger Create <br>
		<input type="checkbox" name="voucher" value="true">Voucher <br>
		<input type="checkbox" name="bank" value="true">Bank <br>
		<input type="checkbox" name="inventory_report" value="true">Inventory Report <br>
		<input type="checkbox" name="trial_balance" value="true">Trial Balance <br>
		<input type="checkbox" name="balance_sheet" value="true">Balance Sheet <br>
		<input type="checkbox" name="financial_statement" value="true">Financial Statement <br>
		<input type="checkbox" name="database_maintanance" value="true">Database Maintanance <br>
		<br>
		<input type="submit" value='Craete User'>
	</form>

</div>

@stop