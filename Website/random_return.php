<?php
/*
Function: random_return()
Setup for the random function, and sets up the connection and query
Switch statement is used to setup the query and what table it pulls from
During fetching, an if statement is used to differentiate the output and HTML
*/
function random_return()
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
		$random_query_str = "";
	}
	/* Switch\case statement: uses the "choice" from the drop down menu on random_opt(), and changes the string/query 
	   dbms_random.value is used to select a sample set, rownum <= 1 is used to select the ONE row */
	switch ($choice) {
	case "eatery":
		$random_query_str = "select * from (select * from Eatery order by dbms_random.value) where rownum <= 1";
		break;
	case "event":
		$random_query_str = "select * from (select * from Event order by dbms_random.value) where rownum <= 1";
		break;
	case "attract":
		$random_query_str = "select * from (select * from Attraction order by dbms_random.value) where rownum <= 1";
		break;
	case "outdoor":
		$random_query_str = "select * from (select * from Outdoor_dest order by dbms_random.value) where rownum <= 1";
		break;
	}
	
	// Setup query
	$conn = hsu_conn($username, $password);
	
	$random_query = oci_parse($conn, $random_query_str);
	oci_execute($random_query);
			while (oci_fetch($random_query))
			{
				/* There might be a better way to do this, but in any case, it works
				   The if is used to pick from the drop down from random_opt() and produce the result
				   and the corresponding output in HTML */
				if ($choice == "eatery") {
						$current_name = oci_result($random_query, "EAT_ID");
						$current_add = oci_result($random_query, "STREET_ADD");
						$current_city = oci_result($random_query, "CITY");
						$current_desc = oci_result($random_query, "DESCRIPTION");
						$current_price = oci_result($random_query, "PRICE");
						$current_link = oci_result($random_query, "LINK");
						?>
							You should eat at: <?= $current_name ?> !
							<br />
							<?= $current_link ?>
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							<?= $current_price ?>
						<?php
				}
				elseif ($choice == "event") {
						$current_name = oci_result($random_query, "EV_ID");
						$current_type = oci_result($random_query, "EV_TYPE");
						$current_add = oci_result($random_query, "STREET_ADD");
						$current_city = oci_result($random_query, "CITY");
						$current_desc = oci_result($random_query, "DESCRIPTION");
						$current_price = oci_result($random_query, "TICKET_PRICE");
						$current_alcohol = oci_result($random_query, "ALCOHOL");
						$current_food = oci_result($random_query, "FOOD");
						?>
							You should go to: <?= $current_name ?>! Which is a: <?= $current_type ?>.
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							It'll cost you <?= $current_price ?>.
							<br />
							Will it have food?: <?= $current_food ?> Will it have alcohol?: <?= $current_alcohol ?>
						<?php
				}
				elseif ($choice == "attract") {
						$current_name = oci_result($random_query, "ATT_ID");
						$current_type = oci_result($random_query, "ATT_TYPE");
						$current_add = oci_result($random_query, "STREET_ADD");
						$current_city = oci_result($random_query, "CITY");
						$current_desc = oci_result($random_query, "DESCRIPTION");
						$current_price = oci_result($random_query, "PRICE");
						?>
							You should check out: <?= $current_name ?>! Which is a: <?= $current_type ?>.
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							It'll cost you <?= $current_price ?>.
							<br />
						<?php
				}
				elseif ($choice == "outdoor"){
						$current_name = oci_result($random_query, "OUT_ID");
						$current_bath = oci_result($random_query, "BATHROOMS");
						$current_dist = oci_result($random_query, "DISTANCE");
						$current_diff = oci_result($random_query, "DIFFICULTY");
						$current_add = oci_result($random_query, "STREET_ADD");
						$current_city = oci_result($random_query, "CITY");
						$current_cost = oci_result($random_query, "COST");
						$current_desc = oci_result($random_query, "DESCRIPTION");
						$current_dir = oci_result($random_query, "DIRECTIONS");
						?>
							You should look at: <?= $current_name ?>! 
							<br />
							<?= $current_desc ?>
							<br />
							<?= $current_dir ?>
							<br />
							<?= $current_add ?>, <?= $current_city ?>
							<br />
							It'll cost you <?= $current_cost ?>.
							<br />
							Does it have bathrooms?: <?= $current_bath ?>. 
							<br />
							How difficult is it?: <?= $current_diff ?>. How far is it? <?= $current_dist ?>
							<br />
						<?php
				}
				else {
					?>
					 You didn't select anything!
					<?php
				}
				
			}
				?>
				<?php
		?>
		<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			<fieldset>
				
			<br />
			<input type="submit" name="random" value="Another please!" /> <!-- Runs the select all over again -->
			
			<input type="submit" name="choose_again" value="Select something else" /> <!-- Goes back to random_opt() --> 
			</fieldset>
		</form>
	
	<?php
		oci_free_statement($random_query);
		oci_close($conn);
}
?>