<?php
/*
Function: find_return()
*/
function find_return()
{
	// Login is successful, create user\pass variables and place them in $_SESSION
	if ( ! array_key_exists("username", $_SESSION) ) // Initial login order form
    {
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		$choice = $_POST["choice"];
		
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		$_SESSION["choice"] = $choice;
    }
	else
	{	
		$username = $_SESSION["username"];
		$password = $_SESSION["password"];
		$choice = $_SESSION["choice"];
		$query_str = "";
	}
	/* Switch\case statement: uses the "choice" from the drop down menu on find_pick(), and changes the string/query */
	switch ($choice) {
	case "eatery":
		$query_str = "select * from Eatery order by city";
		break;
	case "event":
		$query_str = "select * from Event order by city";
		break;
	case "attract":
		$query_str = "select * from Attraction order by city";
		break;
	case "outdoor":
		$query_str = "select * from Outdoor_dest order by city";
		break;
	}
	
	// Setup query
	$conn = hsu_conn($username, $password);
	
	$query = oci_parse($conn, $query_str);
	oci_execute($query);
	?>
	<fieldset> 
		<legend> Here's what we have in store for you: </legend>
	<?php
			while (oci_fetch($query))
			{
				/* There might be a better way to do this, but in any case, it works
				   The if is used to pick from the drop down from random_opt() and produce the result
				   and the corresponding output in HTML */
				if ($choice == "eatery") {
						$current_name = oci_result($query, "NAME");
						$current_add = oci_result($query, "STREET_ADD");
						$current_city = oci_result($query, "CITY");
						$current_desc = oci_result($query, "DESCRIPTION");
						$current_price = oci_result($query, "PRICE");
						$current_link = oci_result($query, "LINK");
						?>
							<b> Name: </b> <?= $current_name ?>
							<br />
							<b> Website Link: </b> <?= $current_link ?>
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							<b> Average Price: </b> <?= $current_price ?>
							<br /><br />
						<?php
				}
				elseif ($choice == "event") {
						$current_name = oci_result($query, "NAME");
						$current_type = oci_result($query, "EV_TYPE");
						$current_add = oci_result($query, "STREET_ADD");
						$current_city = oci_result($query, "CITY");
						$current_desc = oci_result($query, "DESCRIPTION");
						$current_price = oci_result($query, "TICKET_PRICE");
						$current_alcohol = oci_result($query, "ALCOHOL");
						$current_food = oci_result($query, "FOOD");
						?>
							<b> Event name: </b> <?= $current_name ?>
							<br />
							<b> Event type: </b> <?= $current_type ?>
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							<b> Price: </b> <?= $current_price ?>.
							<br />
							<b> Food?: </b> <?= $current_food ?> <b> Drink?:</b> <?= $current_alcohol ?>
							<br /><br />
						<?php
				}
				elseif ($choice == "attract") {
						$current_name = oci_result($query, "NAME");
						$current_type = oci_result($query, "ATT_TYPE");
						$current_add = oci_result($query, "STREET_ADD");
						$current_city = oci_result($query, "CITY");
						$current_desc = oci_result($query, "DESCRIPTION");
						$current_price = oci_result($query, "PRICE");
						?>
							<b> Attraction name: </b> <?= $current_name ?>
							<br />
							<b>Attraction type: </b> <?= $current_type ?>
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							<b> Cost: </b> <?= $current_price ?>.
							<br /><br /> 
						<?php
				}
				elseif ($choice == "outdoor"){
						$current_name = oci_result($query, "NAME");
						$current_bath = oci_result($query, "BATHROOMS");
						$current_dist = oci_result($query, "DISTANCE");
						$current_diff = oci_result($query, "DIFFICULTY");
						$current_add = oci_result($query, "STREET_ADD");
						$current_city = oci_result($query, "CITY");
						$current_cost = oci_result($query, "COST");
						$current_desc = oci_result($query, "DESCRIPTION");
						$current_dir = oci_result($query, "DIRECTIONS");
						?>
							<b> Name: </b> <?= $current_name ?>! 
							<br />
							<?= $current_desc ?>
							<br />
							<b> Directions: </b> <?= $current_dir ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							<b> Cost: </b> <?= $current_cost ?> <b> Bathrooms: </b> <?= $current_bath ?>.
							<br />
							<b> Ease of Access: </b> <?= $current_diff ?> <b> Distance: </b> <?= $current_dist ?>
							<br /><br />
						<?php
				}
				else {
					?>
					 You didn't select anything!
					<?php
				}
				
			}
			?>
		</fieldset>
		
		<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
				
			<br />
			<input type="submit" name="choose_again" value="Select something else" /> <!-- Goes back to random_opt() --> 
		</form>
	
	<?php
		oci_free_statement($query);
		oci_close($conn);
}
?>