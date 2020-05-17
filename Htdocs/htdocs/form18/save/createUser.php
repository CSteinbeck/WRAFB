<!DOCTYPE html>
<html>
<head>
<title>Our Create User Example</title>
</head>
<body>
<h1>Create User Account</h1>

<?php
	session_start();

	if (isset($_POST['password1']))
	{
	        if ($_POST['password1'] == $_POST['password2'])
	        {
	                $md5Pass = md5($_POST['password1']);
	                echo 'Nice passwords.  Hash to: ' . $md5Pass . "<br>";
	                $con = new mysqli('localhost','root','CwFq9Xrn3Lvp','mercerafb');
	                if ($con->connect_error)
	                {
		                die('Could not connect to mySQL: ' . $con->connect_error);
	                }

                $sql = "INSERT INTO Users (`UserID`, `FirstName`, `LastName`, `Rank`, `Password`) VALUES ('$_POST[username]','$_POST[firstname]', '$_POST[lastname]', '$_POST[rank]', '$md5Pass')";
                echo "Built sql: " . $sql;

                if (!$con->query($sql)=== TRUE)
                   {
                   die('Error adding New User: ' . $con->error);
                   }
                echo "go check the database!";
         	}


        	else
        	{
                	die('Passwords do not match');
        	}
	}


	if (isset($_SESSION["user"]) && $_SESSION["user"] == "jstars")
	{
?>

<form method="post" action="createUser.php">
  First name:<br>
  <input type="text" name="firstname"><br>
  Last name:<br>
  <input type="text" name="lastname" ><br><br>
  User name:<br>
  <input type="text" name="username" ><br><br>
  Rank:<br>
  <input type="text" name="rank" ><br><br>
  Password:<br>
  <input type="password" name="password1" ><br><br>
  Re-enter your Password:<br>
  <input type="password" name="password2" ><br><br>
  <input type="submit" value="Create Account">
</form>

<?php
	}
	else
		echo "You must have administrative permission to create new users.";
?>

</body>
</html>


