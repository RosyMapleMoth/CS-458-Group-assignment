<?php

/*
Function: admin_returnbiz()
Selects all from the Biz_prof table, sorted by city
Returns in a table form in HTML
Allows admin to then logout, or return to the "Start" page
*/

function admin_returnbiz()
{
	
	// Login is successful, create user\pass variables and place them in $_SESSION
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	
	$conn = hsu_conn($username, $password);
     // Connection successful
    // set up select statement, and execute it

	$returnbiz_query = 'select * from Biz_prof
						order by city';

	$returnbiz_stmt = oci_parse($conn, $returnbiz_query);

	oci_execute($returnbiz_stmt, OCI_DEFAULT);
	?>
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
		<fieldset>
		<table>
			<caption> Businesses currently in DB </caption>
			<tr> <th scope="col"> Name </th>
				 <th scope="col"> Address </th>
				 <th scope="col"> City </th>
				 <th scope="col"> Phone # </th>
				 <th scope="col"> Type </th>
				 <th scope="col"> Active Profile </th>
			</tr>

			<?php
			while (oci_fetch($returnbiz_stmt))
			{
				$curr_name = oci_result($returnbiz_stmt, "NAME");
				$curr_address = oci_result($returnbiz_stmt, "STREET_ADD");
				$curr_city = oci_result($returnbiz_stmt, "CITY");
				$curr_phone = oci_result($returnbiz_stmt, "PHONE");
				$curr_type = oci_result($returnbiz_stmt, "TYPE");
				$curr_active = oci_result($returnbiz_stmt, "ACTIVE");

				?>

				<tr>
					 <td> <?= $curr_name ?>  </td>
					 <td> <?= $curr_address ?> </td>
					 <td> <?= $curr_city ?> </td>
					 <td class="numeric"> <?= $curr_phone ?> </td>
					 <td> <?= $curr_type ?> </td>
					 <td> <?= $curr_active ?> </td>
				</tr>
				<?php
			}
			?>
		</table>	
		</fieldset>
		
		<input type="submit" name="return" value= "Return to selection page" />
		<input type="submit" name="logout" value= "Logout" />
	</form>
	
	<?php
	oci_free_statement($returnbiz_stmt);
	oci_close($conn);
}
?>

