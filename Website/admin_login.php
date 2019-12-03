<?php

/*
Function: admin_login()
Creates a login form.
That's it, nothing else.
*/

function admin_login()
{
	?>
		<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			<fieldset>
				<legend> Please enter Oracle username/password: 
					</legend>

				<label for="username"> Username: </label>
				<input type="text" name="username" id="username" /> 
				<br /><br />
				<label for="password"> Password: </label>
				<input type="password" name="password" 
					   id="password" />
			</fieldset>
			<br />
			<input type="submit" value="Login" />
        </form>
	
	<?php
}
?>

