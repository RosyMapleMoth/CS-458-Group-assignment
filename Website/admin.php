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

<?php
       ini_set('display_errors', 1);
       error_reporting(E_ALL);
	   
	   require_once("hsu_conn.php");
    ?>
<?php
    if ( ! array_key_exists("username", $_POST) )
    {
        // No username exists, produce the login form
        ?>
  
        <form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                        ENT_QUOTES) ?>">
        <fieldset>
            <legend> Please enter Oracle username/password: 
                </legend>

            <label for="username"> Username: </label>
            <input type="text" name="username" id="username" /> 

            <label for="password"> Password: </label>
            <input type="password" name="password" 
                   id="password" />

            <div class="submit">
                <input type="submit" value="Log in" />
            </div>
        </fieldset>
        </form>
    <?php
    }      

    else
    {
		// Grab username and password, and setup connection
		
        $username = strip_tags($_POST["username"]);
        $password = $_POST["password"];
        $conn = hsu_conn($username, $password);

        // Unable to connect

        if (! $conn)
        {
        ?>
            <p> Unable to login to Oracle </p>

            <?php
            exit;
        }
 
        // Connection successful

        // set up my select statement, and execute it

        $sample_query = 'select * from Biz_prof';


        $sample_stmt = oci_parse($conn, $sample_query);
   
        oci_execute($sample_stmt, OCI_DEFAULT);
        ?>


        <?php
        while (oci_fetch($sample_stmt))
        {
            $curr_name = oci_result($sample_stmt, "Name");
            $curr_type = oci_result($sample_stmt, "Type");
			$curr_null = oci_result($sample_stmt, "Null?");

            ?>

            <tr>
                 <td> <?= $curr_name ?> </td>
                 <td> <?= $curr_type ?> </td>
				 <td> <?= $curr_null ?> </td>
            </tr>
            <?php
        }
        ?>
        </table>
		
		<br />

        <?php
		// Closing connection and statements

        oci_free_statement($sample_stmt);
        oci_close($conn);
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