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
					<label> Event name:
						<input type="text" name="eventname" required="required" maxlength="60" size="35" />
					</label>
					<br/><br/>
					<label> Day:
						<input type="number" name="eventday" required="required" min="1" max="31" />
					</label>
					<label> Month:
						<select name="eventmon" required="required">
							<option value=""> Pick... </option>
							<option value="JAN"> Jan  </option>
							<option value="FEB"> Feb </option>
							<option value="MAR"> Mar </option>
							<option value="APR"> Apr </option>
							<option value="MAY"> May  </option>
							<option value="JUN"> Jun </option>
							<option value="JUL"> Jul </option>
							<option value="AUG"> Aug </option>
							<option value="SEP"> Sep </option>
							<option value="OCT"> Oct </option>
							<option value="NOV"> Nov </option>
							<option value="DEC"> Dec </option>
						</select>
					</label>
					<label> Year:
						<input type="number" name="eventyear" required="required" min="1900" max="2030"/>
					</label>
					<label> Time:
						(1-23) <input type="number" name="hour" required="required" min="1" max="23"/> : 
						<input type="number" name="minute" required="required" min="00" max="59"/>
					</label>
					<br/><br/>
					<label> Location:
						<select name="eventloc" required="required">
							<option value=""> Please choose... </option>
							<option value="5000"> Arcata Community Gallery  </option>
							<option value="5009"> Blue Lake Grange </option>
							<option value="5002"> Community Center of Arcata </option>
							<option value="5008"> Community Center of the North Coast </option>
							<option value="5004"> Eureka Artist Co-op  </option>
							<option value="5006"> Eureka College </option>
							<option value="5003"> Eureka Community Arcata Garden </option>
							<option value="5007"> Fortuna Art Gallery  </option>
							<option value="5001"> Gallery 42 </option>
							<option value="5005"> Gallery at 700 </option>
						</select>
					</label>
					<label> Type: 
						<select name="eventtype" required="required">
							<option value="" selected="selected"> Please choose... </option>
							<option value="W"> Workshop  </option>
							<option value="C"> Class </option>
							<option value="S"> Show </option>
						</select>
					</label>
			</fieldset>
		</div>
		<br />
		<div id="artinfo">
			<fieldset>
				<legend> Related art and artist info, if applicable </legend>
					<label> Related art:
						<input type="text" name="relatedart" maxlength="6" />
					</label>
					<label> Related artist:
						<input type="text" name="relatedartist" maxlength="6" />
					</label>
			</fieldset>
		</div>
		<fieldset>
			<input type="submit" name="confirmnew" value="Submit" />			
			<input type="reset" value="Clear" />
		</fieldset>
	</form>	
	<?php
}
?>

