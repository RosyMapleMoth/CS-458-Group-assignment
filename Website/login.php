<!-- Provides links to either the admin.php login or the owner.php login for business owners -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Find Your Humboldt - Login</title>
		<meta charset="utf-8" />
			
		<link href="css/normalize.css" type="text/css" rel="stylesheet" />

		<link href="css/style.css" type="text/css"  rel="stylesheet" />
		
		<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<?php
	require_once("header.html");
?>

	<div id="content" class="content">
		<a href="owner.php"> Business Owner Login </a>
		<br /> <br />
		<a href="admin.php"> Admin Login </a>
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

