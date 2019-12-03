<?php
/*
Function: find_pick()
Produces a drop down menu to grab the option the person wants
Login form is only needed because Oracle. That's what I'm sticking with.
*/
function find_pick()
{
	
	?>
		<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			<fieldset>
				<label for="username"> Username: </label>
				<input type="text" name="username" id="username" /> 
				<br /><br />
				<label for="password"> Password: </label>
				<input type="password" name="password" 
					   id="password" />
			</fieldset>
			<br />
			<fieldset>
				<label> What do you want?
					<select name="choice">
						<option value="blank" selected="selected">Please select...</option>
						<option value="outdoor">I want to look at the great outdoors</option>
						<option value="attract">I want to check something out</option>
						<option value="eatery">I want to look at food</option>
						<option value="event">I want to do something</option>
					</select>
				</label>
			</fieldset>
			<input type="submit" />
		</form>
	
	<?php
}
?>