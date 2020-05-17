<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x=ua-compatible" content="ie=edge">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="styles.css">
	

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>

 <title>JSTARS SORTIE SITE</title>

<script>
function showhide(element)
{
	var x = document.getElementById(element);
	if (x.style.display == "none")
		x.style.display = "block";
	else
		x.style.display = "none";
}
</script>

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
	   $_SESSION["fullname"] = $row["Rank"] . " " . $row["FirstName"] . " " . $row["LastName"];
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
		<br>
		<h2 style="margin: auto; text-align: center; color: white; font-size: 3.5vw">Please Login to JSTARS Sortie Site</h2>
		<br>
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
	   echo "<br><h2 style='margin:auto; text-align:center; color:white; font-size: 3.5vw;'>Welcome " . $_SESSION["fullname"] . "!</h2><br>";
?>

	<div id="options" style="margin:auto; width:360px; background-color:black; color:white; padding:10px; font-size:2em;">
		Your available options:
		<ul>
			<li><a href="sorties" alt"Bulding Sorties">Building Sorties</a></li>
			<li><a href="form18" alt"Form 18">Form 18</a></li>
<?php
	   if ($_SESSION["user"] == "jstars")
		   echo '<li><a href="createUser.php">Create New Account</a></li>';
?>
			<li><a href=".?logout=true" alt="logout">Logout</a></li>
		</ul>
	</div>

<?php
	}
?>

</body>
</html>

