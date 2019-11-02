<?php

/*
	Submitted by: Micaela Warvi
	Last modified: 2019-05-01
	
	Function: sell_form
	Expects: nothing
	Returns: nothing
	Depends on: sell_login()
	Requires: hsu_conn()
	Side effect: Outputs to the screen a dynamically selected
				 drop down queried from the titles table
				 Also provides a number input for desired quantity
*/

function admin_start()
{	
	
	// Check to see if username and password already exists
	// It does exist, so assign the variables
	if(array_key_exists("username", $_SESSION))
	{
		$username = $_SESSION["username"];
		$password = $_SESSION["password"];
	}
	//Key doesn't exist, grab and add it to $_SESSION
	else
	{
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
	}
	?>
	
	<!-- Building form with drop down selector from query -->
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
		<fieldset>
			<legend> What would you like to do?: </legend>
			
			<input type="submit" name="addbiz" value="Add new business" />
			
			<input type="submit" name="returnbiz" value="List Businesses" />
		</fieldset>
	</form>
	
	<?php
}
?>

