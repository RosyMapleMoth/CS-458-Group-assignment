<!-- Builds the e-mailed form and also provides feedback to the user on whether or not it was submitted successfully -->
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
?>

<?php
	#input from contactus.php form
	$name = 'Name: ' . $_POST['name'];
	$email = $_POST['email'];
	$comment = 'Comment box: ' . $_POST['comment'];
	
	$type = 'Suggestion type: ' . $_POST['type'];
	$description = 'Suggestion description: ' . $_POST['description'];
	
	#Filter input of user e-mail
	#Filter user input
	function filter_email_header($form_field) {
		return preg_replace('/[\0\n\r\|\!\/\<\>\^\$\%\*\&]+/','',$form_field);
	}
	
	#Reassign e-mail with filtered function
	$email = 'Email: ' . filter_email_header($email);

	
	#Send e-mail
	$to = 'mlg40@humboldt.edu';
	$subject = 'Contact Us form from Find Your Humboldt';
	$message = "You have received a form from the Contact Us page of Find Your Humboldt" . "\r\n" . $name . "\r\n" . $email . "\r\n" . $comment . "\r\n" . $type . "\r\n" . $description;
	$headers = 'Contact Us form from Find Your Humboldt';
	$sent = mail($to, $subject, $message, $headers);

	#If form is successfully sent, produce 'thank you'
	#Otherwise, show that is was unsuccessful
	if ($sent) 
	{
		?>
		<h1>Thank You</h1>
		<p>Thank you for your feedback.</p>

		<?php

	} 
	else {
		?>
		<h1>Something went wrong</h1>
		<p>We could not send your feedback. Please try again.</p>
		<?php
	}
?>

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

