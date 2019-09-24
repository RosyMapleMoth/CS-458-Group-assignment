<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Travel Humboldt </title>
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
		<!-- Content div is controlled by jQuery, and will load PHP files based on the what the user click -->
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/nav.js"></script>
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