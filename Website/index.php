<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Find Your Humboldt </title>
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
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porttitor massa id neque aliquam vestibulum morbi blandit cursus risus. Eleifend quam adipiscing vitae proin. Sodales neque sodales ut etiam sit amet nisl purus. Arcu felis bibendum ut tristique et egestas quis. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Turpis egestas pretium aenean pharetra. Nisi quis eleifend quam adipiscing vitae. Erat imperdiet sed euismod nisi porta lorem mollis aliquam. Pellentesque eu tincidunt tortor aliquam nulla facilisi. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Posuere urna nec tincidunt praesent semper.

		Imperdiet proin fermentum leo vel orci porta non pulvinar neque. Eget mauris pharetra et ultrices neque. Ultrices dui sapien eget mi proin sed libero enim. Eleifend mi in nulla posuere sollicitudin aliquam ultrices. Nunc sed blandit libero volutpat sed cras ornare. Consequat ac felis donec et. Elementum facilisis leo vel fringilla est. Justo nec ultrices dui sapien eget. Interdum velit euismod in pellentesque massa. Netus et malesuada fames ac turpis egestas sed tempus. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Erat velit scelerisque in dictum non consectetur.

		Aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Amet risus nullam eget felis eget nunc lobortis. Ultrices dui sapien eget mi proin. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Tellus id interdum velit laoreet id donec ultrices. Diam phasellus vestibulum lorem sed. Non pulvinar neque laoreet suspendisse interdum consectetur. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Quis eleifend quam adipiscing vitae proin. Sed adipiscing diam donec adipiscing. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec. Euismod nisi porta lorem mollis. Nisi est sit amet facilisis magna etiam. Enim nulla aliquet porttitor lacus. Morbi tempus iaculis urna id volutpat.
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