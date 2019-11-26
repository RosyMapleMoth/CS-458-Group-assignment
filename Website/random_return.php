<?php

/*
	
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
		$case = "";
    }
	else
	{	
		$username = $_SESSION["username"];
		$password = $_SESSION["password"];
		$choice = $_SESSION["choice"];
		$random_query_str = "";
	
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
	}
	
	// Setup query
	$conn = hsu_conn($username, $password);
	
	$random_query = oci_parse($conn, $random_query_str);
	oci_execute($random_query);

			while (oci_fetch($random_query))
			{
				$curr_random_id = oci_result($random_query, "MOVIE_NUM");
				?>
				Number: <?= $curr_random_id ?>
				<?php
			}
		?>
		<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			<fieldset>
				
			<br />
			<input type="submit" name="random" value="Another please!" />
			
			<input type="submit" name="choose_again" value="Select something else" />
			</fieldset>
		</form>
	
	<?php
		oci_free_statement($random_query);
		oci_close($conn);
}
?>