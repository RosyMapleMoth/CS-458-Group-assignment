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
	   require_once("admin_returnbiz.php");
    ?>

    <link href=
        "http://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
        type="text/css" rel="stylesheet" />

    <link href="css\style.css" type="text/css"   
          rel="stylesheet" />
</head>

<body>

<?php
	// No username exists, produce the initial login form
    if (! array_key_exists("step", $_SESSION))
    {
		admin_login();
		$_SESSION['step'] = "admin_start";
    }      
	// Login has succeeded, shows the "start" page for admins
    elseif (($_SESSION['step'] == "admin_start") || (array_key_exists("return", $_POST))) 
    {
		admin_start();
		$_SESSION['step'] = "pick";
    }
	
	//Admin wants to add a new business
	elseif ((array_key_exists("addbiz", $_POST)) && ($_SESSION['step'] = "pick")) 
	{
		admin_addbiz();
		$_SESSION['step'] = "check";
	}
	//Admin wants to pull all businesses from DB
	elseif ((array_key_exists("returnbiz", $_POST))  && ($_SESSION['step'] = "pick"))
	{
		admin_returnbiz();
		$_SESSION['step'] = "getevents";
	}
	// User has clicked done
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
        session_regenerate_id(TRUE);
        session_start();
     
        admin_login();
        $_SESSION['step'] = "option";
	}
?>
</html>
</body>