<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Find Your Humboldt - Contact Us</title>
		<meta charset="utf-8" />
			
		<link href="css/normalize.css" type="text/css" rel="stylesheet" />

		<link href="css/style.css" type="text/css"  rel="stylesheet" />

<script src="https://www.google.com/recaptcha/api.js?render=6LfeNMQUAAAAAAq1ZRT5UBd9TskftWMX4Wvefjif"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LfeNMQUAAAAAAq1ZRT5UBd9TskftWMX4Wvefjif', {action: 'homepage'}).then(function(token) {
       ...
    });
});
</script>	
		<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<?php
	require_once("header.html");
?>

	<div id="content" class="content">
		<form action="contactus_submit.php" method="POST">
				
			<div id="form">
				<fieldset>
					<legend> Talk to Us </legend>
						<label>Name:
							<input type="text" name="name" required="required" maxlength="25" size="25" />
						</label>
						<br /><br />
						<label>Email:
							<input type="text" name="email" required="required" maxlength="25" size="25" />
						</label>
						<br /><br />
						<label>Comment/Message:
							<textarea name="comment" required="required" rows="5" cols="25" /></textarea>
						</label>
						<br /><br />
				</fieldset>
				<br/><br/>
				<fieldset>
					<legend> Are we missing something awesome? Please let us know! </legend>
						<label> What type of something is this?
							<select name="type">
								<option value="blank" selected="selected">Please select...</option>
								<option value="dest">Destination</option>
								<option value="eatery">Eatery</option>
								<option value="ev">Event</option>
								<option value="att">Attraction</option>
							</select>
						</label>
						<br /><br />
						<label>Tell us all about it!:
							<textarea name="description" required="required" rows="5" cols="25" /></textarea>
						</label>
						<br/><br/>
				</fieldset>
			</div>
		
			<div class="g-recaptcha" data-sitekey="6LfeNMQUAAAAAAq1ZRT5UBd9TskftWMX4Wvefjif">
			</div>      
			<br/>
			
			<fieldset>
				<input type="submit" value="Submit">
				<input type="reset" value="Clear" />
			</fieldset>
		</form>	
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

