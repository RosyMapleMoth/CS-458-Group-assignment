<?php
	session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Find Your Humboldt - Feeling Random?</title>
		<meta charset="utf-8" />
			
		<link href="css/normalize.css" type="text/css" rel="stylesheet" />

		<link href="css/style.css" type="text/css"  rel="stylesheet" />
		
		<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<?php
	require_once("header.html");
	require_once("random_opt.php");
	require_once("random_return.php");
	require_once("hsu_conn.php");
?>

	<div id="content" class="content">
	<?php
			// No username exists, produce the initial choice form
			if (! array_key_exists("step", $_SESSION) || (array_key_exists("choose_again", $_POST)))
			{
				session_destroy();
				session_start();
				session_regenerate_id(TRUE);
				random_opt();
				$_SESSION['step'] = "random_return";
			}      
			// Login has succeeded, show a random thing based on previous step choice
			elseif (($_SESSION['step'] == "random_return") || (array_key_exists("random", $_POST))) 
			{
				random_return();
				$_SESSION['step'] = "random";
			}

			// User has clicked done
			elseif(array_key_exists("logout", $_POST))
			{
				session_destroy();
				?>
				<h1> You have been logged out </h1>
				<h2> <a href="https://nrs-projects.humboldt.edu/~mlg40/project/index.php"> Return </a> to the home page. </h2>
				<?php
			}
			else // Should never happen, but just in case, session is restarted and login form is shown
			{
				session_destroy();
				session_regenerate_id(TRUE);
				session_start();
			 
				random_opt();
				$_SESSION['step'] = "random_return";
			}
		?>
	</div>

	<!-- Footer -->

<?php
	require_once("footer.html");
?>
	<!-- Used for switching the navigation between full top nav and hamburger icon -->
	<script>
		function myFunction() {
		  var x = document.getElementById("topnav");
		  if (x.className === "topnav") {
			x.className += " responsive";
		  } else {
			x.className = "topnav";
		  }
		}
	</script>
	</body>
</html>

