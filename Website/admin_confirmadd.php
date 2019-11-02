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
	$new_event_call = 'begin insert_new_event(:new_eventname, :new_eventdate,
											  :new_eventloc, :new_usr_time,
											  :new_eventtype, :new_relatedart,
											  :new_relatedartist); end;';
	$new_event_stmt = oci_parse($conn, $new_event_call);
	
	// Setup variables
	$eventname_in = strip_tags($_POST['eventname']);
	$eventdate_in = strip_tags($_POST['eventday']) . '-' . strip_tags($_POST['eventmon']) . '-' . strip_tags($_POST['eventyear']);
	$usr_time_in = strip_tags($_POST['hour']) . strip_tags($_POST['minute']);
	$eventloc_in = strip_tags($_POST['eventloc']);
	$eventtype_in = strip_tags($_POST['eventtype']);
	$relatedart_in = strip_tags($_POST['relatedart']);
	$relatedartist_in = strip_tags($_POST['relatedartist']);
	
	// Setup binds
	oci_bind_by_name($new_event_stmt, ":new_eventname", $eventname_in);
	oci_bind_by_name($new_event_stmt, ":new_eventdate", $eventdate_in);
	oci_bind_by_name($new_event_stmt, ":new_usr_time", $usr_time_in);
	oci_bind_by_name($new_event_stmt, ":new_eventloc", $eventloc_in);
	oci_bind_by_name($new_event_stmt, ":new_eventtype", $eventtype_in);
	oci_bind_by_name($new_event_stmt, ":new_relatedart", $relatedart_in);
	oci_bind_by_name($new_event_stmt, ":new_relatedartist", $relatedartist_in);
	
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
				<caption> Your event has been added.  </caption>
				<tr>
					<th>Event Name </th>
					<th>Date </th>
					<th>Time </th>
					<th>Location </th>
					<th>Event type </th>
					<th>Art</th>
					<th>Artist</th>
				</tr>
				<tr>
					<td> <?= $eventname_in ?></td>
					<td><?= $eventdate_in ?></td>
					<td><?= $usr_time_in ?> </td>
					<td><?= $eventloc_in ?> </td>
					<td><?= $eventtype_in ?> </td>
					<td><?= $relatedart_in ?> </td>
					<td><?= $relatedartist_in ?> </td>
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