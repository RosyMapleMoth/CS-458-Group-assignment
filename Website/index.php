<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Travel Humboldt </title>
		<meta charset="utf-8" />
		
    <link href=
        "http://nrs-projects.humboldt.edu/~st10/styles/normalize.css" type="text/css" rel="stylesheet" />

    <link href="css/style.css" type="text/css"  rel="stylesheet" />
	
	<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="nav.js"></script>
	</head>

<?php
	require_once("header.html");
?>

	<div class="content">
	Look at me, pretending to be a fancy designer with my Latin. 
	
	 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum suscipit lacus sit amet ultrices. Proin mauris quam, malesuada ut tincidunt in, commodo scelerisque mi. Nullam posuere neque sed augue tincidunt, a imperdiet erat tristique. Pellentesque sodales pulvinar metus. Quisque efficitur tincidunt congue. Phasellus id ante scelerisque, ullamcorper ipsum vitae, eleifend orci. Vestibulum tristique justo ut tempus bibendum. Integer pretium neque nisi, vitae pulvinar metus fermentum vel. Vivamus commodo sollicitudin suscipit. Suspendisse id dictum massa. Vivamus finibus sem ante, eu lobortis massa condimentum eu. Nulla sagittis eros nec eros tincidunt ullamcorper. Duis aliquet nisl non dolor sollicitudin consectetur. Sed ipsum tortor, consequat vel fringilla nec, tempus vel risus. Nunc malesuada, nunc vel dictum efficitur, odio nibh viverra ligula, in cursus ex mauris eu enim.
	</div>

	<!-- Footer -->

<?php
	require_once("footer.html");
?>

	<script>
		function myFunction() {
		  var x = document.getElementById("myTopnav");
		  if (x.className === "topnav") {
			x.className += " responsive";
		  } else {
			x.className = "topnav";
		  }
		}
	</script>
	</body>
</html>