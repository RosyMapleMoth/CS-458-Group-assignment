<?php
    session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title> Find Your Humboldt - Admin Login </title>
    <meta charset="utf-8" />

    <?php
       ini_set('display_errors', 1);
       error_reporting(E_ALL);

	   require_once("hsu_conn.php");
	   require_once("admin_login.php");
	   require_once("admin_start.php");
	   require_once("admin_addbiz.php");
	   require_once("admin_confirmadd.php");
	   require_once("admin_addsurvey.php");
	   require_once("admin_confirmadd_survey.php");
	   require_once("admin_returnbiz.php");
    ?>

	<link href="css/normalize.css" type="text/css" rel="stylesheet" />

	<link href="css/style.css" type="text/css"  rel="stylesheet" />
	
	<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
	require_once("header.html");
?>

<div id="content" class="content">
	<?php

		// No username exists, produce the initial login form
		if (! array_key_exists("step", $_SESSION))
		{
			admin_login();
			$_SESSION['step'] = "admin_start";
		}      
		// Login has succeeded, shows the "start" page for admins
		// This is basically showing the option to "add a business", "return current business" etc. 
		elseif (($_SESSION['step'] == "admin_start") || (array_key_exists("return", $_POST))) 
		{
			admin_start();
			$_SESSION['step'] = "pick";
		}

		//Admin wants to add a new business
		elseif ((array_key_exists("addbiz", $_POST)) && ($_SESSION['step'] = "pick")) 
		{
			admin_addbiz();
			$_SESSION['step'] = "confirmadd";
		}
		//Admin wants to add a new survey from the contact form
		elseif ((array_key_exists("addsurvey", $_POST)) && ($_SESSION['step'] = "pick")) 
		{
			admin_addsurvey();
			$_SESSION['step'] = "confirmadd_survey";
		}
		//Confirmation page. Let's the admin know that the business was added without issue, and shows the information they added.
		elseif ((array_key_exists("confirmadd", $_POST))  && ($_SESSION['step'] = "confirmadd")) 
		{
			admin_confirmadd();
			$_SESSION['step'] = "check";
		}
		//Confirmation page. Let's the admin know that the survey was added without issue, and shows the information they added.
		elseif ((array_key_exists("confirmadd_survey", $_POST))  && ($_SESSION['step'] = "confirmadd_survey")) 
		{
			admin_confirmadd_survey();
			$_SESSION['step'] = "check";
		}
		// Admin wants to pull all businesses from DB
		elseif ((array_key_exists("returnbiz", $_POST))  && ($_SESSION['step'] = "pick"))
		{
			admin_returnbiz();
			$_SESSION['step'] = "check";
		}
		// User has opted to return to the menu
		elseif(array_key_exists("return", $_POST))
		{
			admin_start();
			$_SESSION['step'] = "pick";
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
			session_start();
			session_regenerate_id(TRUE);
		 
			admin_login();
			$_SESSION['step'] = "option";
		}
		require_once("footer.html");
	?>
</div>
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