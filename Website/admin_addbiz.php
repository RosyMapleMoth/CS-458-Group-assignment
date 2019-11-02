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

function admin_addbiz()
{	
	?>
	<hr />
	<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">		
		<div id="eventinfo">
			<fieldset>
				<legend> Event Information </legend>
					<label> Business Name:
						<input type="text" name="name" required="required" maxlength="25" size="25" />
					</label>
					<label> Street address:
					<input type="text" name="street_add" required="required" maxlength="25" size="25" />
					</label>
					<label> City:
					<input type="text" name="city" required="required" maxlength="20" size="20" />
					</label>
					<label> State:
					<input type="text" name="state" required="required" maxlength="2" size="2" />
					</label>
					<br/><br/>
					<label> Type:
						<input type="text" name="type" required="required" maxlength="20"/>
					</label>
					<label> Phone:
						<input type="text" name="phone" required="required" maxlength="20"/>
					</label>
					<label> Liaison:
						<input type="text" name="liaison" required="required" maxlength="20"/>
					</label>
					<br/><br/>
			</fieldset>
		</div>
		<br />
		<fieldset>
			<input type="submit" name="confirmadd" value="Submit" />			
			<input type="reset" value="Clear" />
		</fieldset>
	</form>	
	<?php
}
?>

