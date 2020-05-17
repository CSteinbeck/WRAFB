<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x=ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="styles.css">
	

	<link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>

 <title>JSTARS SORTIE SITE</title>
  </head>
<body>
<header>
<h1 class="siteheader">JSTARS &nbsp;&nbsp;  SORTIE&nbsp; &nbsp;  SITE</h1>
</header>

<?php
	session_start();

	$con = new mysqli('localhost','root','CwFq9Xrn3Lvp','mercerafb');
	if ($con->connect_error)
		  {
			    die('Could not connect to mySQL: ' . $con->connect_error);
		  }

	if (isset($_POST['userid']))
{

$md5Password = md5($_POST['Password']);
$sql = "SELECT * FROM users WHERE UserID = '" . $_POST['userid'] . "' AND Password = '" . $md5Password . "'";

$result = $con->query($sql);

if ($result->num_rows == 1)
{
	   $row = $result->fetch_assoc();
	   $_SESSION["user"] = $row["UserID"];
	   $_SESSION["fullname"] = $row["FirstName"] . " " . $row["LastName"];
}
else
{
   echo "LOGIN FAILED!<br>";
print_r($result);
}

}


if (isset($_GET["logout"]))
{
	if ($_GET["logout"] == "true")
	{
		session_unset();
		session_destroy();
	}
}


	if (!isset($_SESSION["user"]))
	{
?>
		<h2 style="margin: auto; text-align: center; color: white; font-size: 1.5vw">Please Login to JSTARS Scheduler</h2>
		<div style="margin:auto; width:260px; background-color:black; color:white; padding:20px;">
		<form method="post" action="index.php">
		   UserID: <input type="text" name="userid" /><br />
		   Password: <input type="password" name="Password" /><br />
		   <input type="submit" value="Login" /><br />
		</form>
		</div>

<?php
	}
	else
	{
	   echo "<h2>Welcome to JSTARS Scheduler " . $_SESSION["user"] . "!</h2><br>";
	   echo '<a href=".?logout=true">Logout</a>';
	   if ($_SESSION["user"] == "jstars")
		   echo '<span style="width:150px;"> </span><a href="createUser.php">Create New Account</a>';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Form 18 Landing Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<div class="container">
<div class="card">
  <div class="card-header">
    Mission Crew Commnander
  </div>
  <div class="card-body">
    <h5 class="card-title">MCC</h5>
   <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="/mcc.html" class="btn btn-primary">Go to MCC Form 18</a>
  </div>
</div>
<div class="card">
  <div class="card-header">
    Aircraft Commander
  </div>
  <div class="card-body">
    <h5 class="card-title">AC</h5>
    <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="/ac.html" class="btn btn-danger">Go to AC Form 18</a>
  </div>
</div>
<div class="card">
  <div class="card-header">
    Radar Techs and Comm Techs
  </div>
  <div class="card-body">
    <h5 class="card-title">RT and CT</h5>
   <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="/rtct.html" class="btn btn-warning">Go to RT and CT Form 18</a>
  </div>
</div>
<div class="card">
  <div class="card-header">
    Senior Director
  </div>
  <div class="card-body">
    <h5 class="card-title">SD</h5>
    <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="/sd.html" class="btn btn-primary">Go to SD Form 18</a>
  </div>
</div>
</div>

<?php
	}
?>

</body>
</html>

