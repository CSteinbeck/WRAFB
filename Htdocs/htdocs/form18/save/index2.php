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
		<h2 style="margin: auto; text-align: center; color: white; font-size: 1.5vw">Please Login to JSTARS Sortie Site</h2>
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
	   echo '<a style="color:white; background-color:black; float:right;" href=".?logout=true">Logout</a><br>';
	   if ($_SESSION["user"] == "jstars")
		   echo ' &nbsp; &nbsp; <a style="color:white; background-color:black; float:right;" href="createUser.php">Create New Account</a>';
	   echo "<h2 style='margin:auto; text-align:center; color:white; font-size: 2.5vw;'>Welcome " . $_SESSION["fullname"] . "!</h2><br>";
?>

<div style="text-align: center;">
<br>
<button  onclick="showhide('block1');">Sortie</button><br>
<div id="block1" class="blockstyle" >
This is block one.
</div>

<button  onclick="showhide('block2');">Mission Information</button><br>
<div id="block2" class="blockstyle">                                                                
This is block 2.
</div>

<button  onclick="showhide('block3');">Live RAP Events Completed</button><br>
<div id="block3" class="blockstyle">                                                                
This is block THREE.
</div>

<button   onclick="showhide('block4');">Crew Training</button><br>
<div id="block4" class="blockstyle">                                                                
This is block four.
</div>

<button  onclick="showhide('block5');">Timing (all times in Zulu)</button><br>
<div id="block5" class="blockstyle">                                                                
This is block 5.
</div>

<button  onclick="showhide('block6');">System Status</button><br>
<div id="block6" class="blockstyle">                                                                
This is block 6.
</div>

<button  onclick="showhide('block7');">Sim RAP Events Completed</button><br>
<div id="block7" class="blockstyle">                                                                
This is block 7.
</div>

<button  onclick="showhide('block8');">Live Activity Completed</button><br>
<div id="block8" class="blockstyle">                                                                
This is block 8.
</div>

<button  onclick="showhide('block9');">Link 16 Contested Degraded Operations Activity</button><br>
<div id="block9" class="blockstyle">                                                                
This is block 9.
</div>

<button  onclick="showhide('block10');">Live Activity Planned</button><br>
<div id="block10" class="blockstyle">                                                                
This is block 10.
</div>

<button  onclick="showhide('block11');">Results of Live Activity</button><br>
<div id="block11" class="blockstyle">                                                                
This is block 11.
</div>

<button  onclick="showhide('block12');">Flight Deck Comments</button><br>
<div id="block12" class="blockstyle">                                                                
This is block 12.
</div>

<button  onclick="showhide('block13');">Mission Crew Comments</button><br>
<div id="block13" class="blockstyle">                                                                
This is block 13.
</div>

</div> 
<?php
	}
?>

</body>
</html>

