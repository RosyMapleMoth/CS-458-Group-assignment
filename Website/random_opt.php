<?php
/*
Function: random_opt()
Produces a drop down menu to grab the option the person wants
Login form is only needed because Oracle. That's what I'm sticking with.
*/
function random_opt()
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
			<fieldset>
				<label> What do you feel like?
					<select name="choice">
						<option value="blank" selected="selected">Please select...</option>
						<option value="outdoor">I feel outdoorsy</option>
						<option value="attract">I feel like checking something out</option>
						<option value="eatery">I feel hungry</option>
						<option value="event">I feel like doing something</option>
					</select>
				</label>
				<input type="submit" />
			</fieldset>
		</form>
	
	<?php
}
?>