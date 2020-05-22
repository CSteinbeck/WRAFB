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

 <title>JSTARS Form 18</title>

<script>
function showhide(element)
{
	var x = document.getElementById(element);
	if (x.style.display == "none")
		x.style.display = "block";
	else
		x.style.display = "none";
}

function redirect($url) 
{
	ob_start();
	header('Location: '.$url);
	ob_end_fluch();
	die();
}
</script>

  </head>
<body>
<header>
<h1 class="siteheader">JSTARS &nbsp;&nbsp;  Form&nbsp; &nbsp;  18</h1>
</header>

<?php
	session_start();

	$con = new mysqli('localhost','root','CwFq9Xrn3Lvp','mercerafb');
	if ($con->connect_error)
		  {
			    die('Could not connect to mySQL: ' . $con->connect_error);
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
		<h2 style="margin: auto; text-align: center; color: white; font-size: 3.5vw"><a href=".." alt="Return to Main">Please Login to JSTARS Sortie Site</a></h2>

<?php
	}
	else
	{
	   echo '<a style="color:white; background-color:black; float:right;" href=".?logout=true">Logout</a><br>';
	   echo '<a style="color:white; background-color:black; float:right;" href="..">Main</a><br>';
	   if ($_SESSION["user"] == "jstars")
		   echo ' &nbsp; &nbsp; <a style="color:white; background-color:black; float:right;" href="createUser.php">Create New Account</a>';
	   echo "<h2 style='margin:auto; text-align:center; color:white; font-size: 3.5vw;'>Welcome " . $_SESSION["fullname"] . "!</h2><br>";
?>

<p style="text-align:center; color:white;">MSN# <input id="msnInputBox" type="text" name="msn"/> <button style="width:20%;" onclick="document.getElementById('msnInputBox').readOnly=true; document.getElementById('groupof4').style.display='block'; this.style.display='none';" >Load Form 18</button>
</p>

<div id="groupof4" style="display:none; text-align: center;">
<br>

<button onclick="showhide('mccdiv');" style="color:white; font-weight: bolder; background-color:DarkOrange; font-size:2vw;">MCC</button><br>
<div id="mccdiv" style="display: none; text-align: center;">
<br>
<button  onclick="showhide('block1');">Sortie Information</button><br>
<div id="block1" style="display:none;" class="blockstyle" >
Sortie Info
</div>

<button  onclick="showhide('block2');">Mission Information</button><br>
<div id="block2" style="display:none;" class="blockstyle">                                                                
Mission Information
</div>

<button  onclick="showhide('block3');">Live RAP Events Completed</button><br>
<div id="block3" style="display:none;" class="blockstyle">                                                                
Live RAP Events Completed
</div>

<button  onclick="showhide('block7');">Sim RAP Events Completed</button><br>
<div id="block7" style="display:none;" class="blockstyle">                                                                
Sim RAP Events Completed
</div>

<button  onclick="showhide('block5');">Timing (All times in Zulu)</button><br>
<div id="block5" style="display:none;" class="blockstyle">                                                                
Timing (All times in Zulu)
</div>

<button   onclick="showhide('block4');">Crew Training</button><br>
<div id="block4" style="display:none;" class="blockstyle">                                                                
Crew Training
</div>

<button  onclick="showhide('block8');">Live Activity Connectivity</button><br>
<div id="block8" style="display:none;" class="blockstyle">                                                                
Live Activity Connectivity
</div>

<button  onclick="showhide('block13');">Mission Crew Comments</button><br>
<div id="block13" style="display:none;" class="blockstyle">                                                                
Mission Crew Comments
</div>
</div>



<button onclick="showhide('rtctdiv');" style="color:white; font-weight: bolder; background-color:SeaGreen; font-size:2vw;">RT & CT</button><br>
<div id="rtctdiv" style="display: none; text-align: center;">
<br>
<button  onclick="showhide('block6');">System Status</button><br>
<div id="block6" style="display:none;" class="blockstyle">                                                                
System Status
</div>

<button  onclick="showhide('block9');">Link 16/Contested Degraded Operations Activity</button><br>
<div id="block9" style="display:none;" class="blockstyle">                                                                
Link 16/Contested Degraded Operations Activity
</div>

<button  onclick="showhide('block16');">RT & CT Comments</button><br>
<div id="block16" style="display:none;" class="blockstyle">                                                                
RT & CT Comments
</div>
</div>



<button onclick="showhide('sddiv');" style="color:white; font-weight: bolder; background-color:RoyalBlue; font-size:2vw;">SD</button><br>
<div id="sddiv" style="display: none; text-align: center;">
<br>
<button  onclick="showhide('block10');">Live Activity Planned</button><br>
<div id="block10" style="display:none;" class="blockstyle">                                                                
This is block 10.
</div>

<button  onclick="showhide('block11');">Results of Live Activity</button><br>
<div id="block11" style="display:none;" class="blockstyle">                                                                
This is block 11.
</div>

<button  onclick="showhide('block12');">Flight Deck Comments</button><br>
<div id="block12" style="display:none;" class="blockstyle">                                                                
This is block 12.
</div>

<button  onclick="showhide('block14');">SD Comments</button><br>
<div id="block14" style="display:none;" class="blockstyle">                                                                
SD Comments
</div>
</div>




<button onclick="showhide('acdiv');" style="color:white; font-weight: bolder; background-color:Indigo; font-size:2vw;">AC</button><br>
<div id="acdiv" style="display: none; text-align: center;">
<br>
<button  onclick="showhide('block15');">AC Comments</button><br>
<div id="block15" style="display:none;" class="blockstyle">                                                                
AC Comments
</div>
</div>

</div> 
<?php
	}
?>

</body>
</html>

