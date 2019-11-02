<?php

/*
	Submitted by: Micaela Warvi
	Last modified: 2019-05-01
	
	Function: sell_login
	Expects: nothing
	Returns: nothing
	Side effect: Outputs to the screen a login if a
				 username and password doesn't exist in the
				 $_POST or $_SESSION array
*/

function admin_login()
{
	?>
        <form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                        ENT_QUOTES) ?>">
		
        <fieldset>
            <legend> Please enter Oracle username/password: 
                </legend>

            <label for="username"> Username: </label>
            <input type="text" name="username" id="username" /> 
			<br /><br />
            <label for="password"> Password: </label>
            <input type="password" name="password" 
                   id="password" />

            <div class="submit">
                <input type="submit" value="Login" />
            </div>
        </fieldset>
        </form>
	
	<?php
}
?>

