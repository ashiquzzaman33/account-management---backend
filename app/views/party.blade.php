<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Party</title>
</head>
<body>
	<form action="{{ URL::route('addParty') }}" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Party Name: </td>
				<td><input type="text" name="party_name"></td>
			</tr>
			<tr>
				<td>Party Address: </td>
				<td><input type="text" name="party_address"></td>
			</tr>
			<tr>
				<td>Mobile No: </td>
				<td><input type="text" name="party_mobile"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" name="party_email"></td>
			</tr>
			<tr>
				<td>Photo: </td>
				<td><input type="file" name="photo"></td>
			</tr>
			<tr>
				<td>Company: </td>
				<td><input type="text" name="party_company_name"></td>
			</tr>
			<tr>
				<td>Company Address: </td>
				<td><input type="text" name="party_company_addres"></td>
			</tr>
			<tr>
				<td>Account Name: </td>
				<td><input type="text" name="account_name"></td>
			</tr>
			<tr>
				<td>Party Type: </td>
				<td>
					<select name="is_payble" id="">
						<option value="true">Payable</option>
						<option value="false">Receivable</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Reference/Special Identity: </td>
				<td><input type="text" name="account_description"></td>
			</tr>
			<tr>
				<td>Opening Balance: dr(+) / cr(-)</td>
				<td><input type="text" name="opening_balance"></td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="account_type" value="1">
					<input type="hidden" name="location" value="1">
				</td>
				<td><input type="submit" value="Create Party"></td>
			</tr>
		</table>
	</form>
</body>
</html>