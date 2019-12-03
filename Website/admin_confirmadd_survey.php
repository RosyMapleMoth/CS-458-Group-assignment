<?php

/*
Function: admin_confirmadd
Grabs information from admin_addbiz
Inserts info into Biz_prof table using the insert_new_biz procedure
*/

function admin_confirmadd_survey()
{
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	$conn = hsu_conn($username, $password);

	// Connection successful
	// Setup calling of procedure
	$new_survey_call = 'begin insert_new_survey(:new_dest, :new_eatery,
												:new_ev, :new_att,
												:new_comment, :new_name,
												:new_email); end;';
	$new_survey_stmt = oci_parse($conn, $new_survey_call);
	
	// Setup variables
	$name_in = strip_tags($_POST['name']);
	$email_in = strip_tags($_POST['email']);
	$comment_in = strip_tags($_POST['comment']);
	if (array_key_exists("dest", $_POST))
	{
		$dest_in = 'yes';
	}
	else
	{
		$dest_in = 'no';
	}
	if (array_key_exists("ev", $_POST))
	{
		$ev_in = 'yes';
	}
	else
	{
		$ev_in = 'no';
	}
	if (array_key_exists("eatery", $_POST))
	{
		$eatery_in = 'yes';
	}
	else
	{
		$eatery_in = 'no';
	}

	if (array_key_exists("att", $_POST))
	{
		$att_in = 'yes';
	}
	else
	{
		$att_in = 'no';
	}
	// Setup binds
	oci_bind_by_name($new_survey_stmt, ":new_name", $name_in);
	oci_bind_by_name($new_survey_stmt, ":new_email", $email_in);
	oci_bind_by_name($new_survey_stmt, ":new_comment", $comment_in);
	oci_bind_by_name($new_survey_stmt, ":new_dest", $dest_in);
	oci_bind_by_name($new_survey_stmt, ":new_ev", $ev_in);
	oci_bind_by_name($new_survey_stmt, ":new_eatery", $eatery_in);
	oci_bind_by_name($new_survey_stmt, ":new_att", $att_in);
	
	// Execute and commit
	oci_execute($new_survey_stmt, OCI_DEFAULT);
	oci_commit($conn);
	?>
	
	<!-- Feeds back to the user that the new business was submitted -->
	<form method="post" 
		  action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>"	  
			<fieldset>
				<legend> Thank you for submitting! </legend>
				<center> <table>
					<caption> The new survey has been added.  </caption>
					<tr>
						<th>Name </th>
						<th>Email </th>
					</tr>
					<tr>
						<td> <?= $name_in ?></td>
						<td><?= $email_in ?></td>
					</tr>
				</center></table>
			<!-- Admin can either return to the initial "start" page or to logout -->
			</fieldset>
			<input type="submit" name="return" value= "Return to selection page" />
			<input type="submit" name="Logout" value= "logout" />	
	</form>
	<?php
	
	// Closing connection and statements
	oci_free_statement($new_survey_stmt);
	oci_close($conn);
    }
?>