<?php

/*
	Submitted by: Micaela Warvi
	Last modified: 2019-05-02
	
	Function: add_event
	Expects: nothing
	Returns: nothing
	Side effect: Runs 'insert_new_event' function on custom db
				 Outputs to the screen the variable information
				 as a confirmation to the user
*/

function admin_confirmadd()
{
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	$conn = hsu_conn($username, $password);

	// Connection successful
	// Setup calling of procedure
	$new_event_call = 'begin insert_new_biz(:new_name, :new_street_add,
											:new_city, :new_state,
											:new_type, :new_active,
											:new_phone,:new_liaison); end;';
	$new_event_stmt = oci_parse($conn, $new_event_call);
	
	// Setup variables
	$name_in = strip_tags($_POST['name']);
	$street_add_in = strip_tags($_POST['street_add']);
	$city_in = strip_tags($_POST['city']);
	$state_in = strip_tags($_POST['state']);
	$type_in = strip_tags($_POST['type']);
	$active_in = 'Y';
	$phone_in = strip_tags($_POST['phone']);
	$liaison_in = strip_tags($_POST['liaison']);
	
	// Setup binds
	oci_bind_by_name($new_event_stmt, ":new_name", $name_in);
	oci_bind_by_name($new_event_stmt, ":new_street_add", $street_add_in);
	oci_bind_by_name($new_event_stmt, ":new_city", $city_in);
	oci_bind_by_name($new_event_stmt, ":new_state", $state_in);
	oci_bind_by_name($new_event_stmt, ":new_type", $type_in);
	oci_bind_by_name($new_event_stmt, ":new_active", $active_in);
	oci_bind_by_name($new_event_stmt, ":new_phone", $phone_in);
	oci_bind_by_name($new_event_stmt, ":new_liaison", $liaison_in);
	
	// Execute and commit
	oci_execute($new_event_stmt, OCI_DEFAULT);
	oci_commit($conn);
	?>
	
	<br />
	<form method="post" 
		  action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">			  
		<fieldset>
			<legend> Thank you for submitting! </legend>
			<table>
				<caption> The new business has been added.  </caption>
				<tr>
					<th>Business Name </th>
					<th>Street Address </th>
					<th>City </th>
					<th>State </th>
					<th>Type </th>
					<th>Phone </th>
					<th>Liaison </th>
				</tr>
				<tr>
					<td> <?= $name_in ?></td>
					<td><?= $street_add_in ?></td>
					<td><?= $city_in ?> </td>
					<td><?= $state_in ?> </td>
					<td><?= $type_in ?> </td>
					<td><?= $phone_in ?> </td>
					<td><?= $liaison_in ?> </td>
				</tr>
			</table>
			<input type="submit" name="return" value= "Return to selection page" />
			<input type="submit" name="logout" value= "logout" />	
		</fieldset>
	</form>
	<?php
	
	// Closing connection and statements
	oci_free_statement($new_event_stmt);
	oci_close($conn);
    }
?>