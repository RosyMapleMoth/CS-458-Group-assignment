<?php

/*
Function: admin_addsurvey()
Produces a form that is used to add a surv to the DB
It's fields are used in the admin_confirmadd_survey page\function
*/

function admin_addsurvey()
{	
	?>
	<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">		
		<div id="eventinfo">
			<fieldset>
				<legend> Event Information </legend>
					<label> Name:
						<input type="text" name="name" required="required" maxlength="25" size="25" />
					</label>
					<br /><br />
					<label> Email:
					<input type="text" name="email" required="required" maxlength="25" size="25" />
					</label>
					<br /><br />
					<label> Comments:
					<input type="text" name="comment" required="required" maxlength="20" size="20" />
					</label>
					<br /><br />
					<label> Suggested Type: <br />
					<label>
					<input type="checkbox" name="dest" /> 
					Outdoor </label> <br />
					<label>
						<input type="checkbox" name="ev" /> 
						Event </label> <br />
					<label>
						<input type="checkbox" name="eatery" /> 
						Eatery </label> <br />
					<label>
						<input type="checkbox" name="att" /> 
						Attraction </label> <br />
					</label>
			</fieldset>
		</div>
		<br />
			<input type="submit" name="confirmadd_survey" value="Submit" />			
			<input type="reset" value="Clear" />
	</form>	
	<?php
}
?>

