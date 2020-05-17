<?php

$servername = "localhost";
$username = "root";
$password = "CwFq9Xrn3Lvp";
$dbname = "mercerafb";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}

$theDate = $_POST['DATE'];
$theMSN = $_POST['MSN'];
$theAC = $_POST['AC'];
$theMCC = $_POST['MCC'];
$theTAIL = $_POST['tail'];
$theActual = $_POST['actual'];
$theComment = $_POST['comments'];

$sql = "INSERT INTO `form18data` (`Date`, `MSN`, `AC`, `MCC`, `TAIL`, `Actual`, `FlightDeck`) 
	VALUES ('$theDate', 
	'$theMSN', 
	'$theAC', '$theMCC', '$theTAIL', '$theActual', '$theComment')";
//$sql = "INSERT INTO `form18data` (`Date`, `MSN`, `AC`, `MCC`, `TAIL`, `Actual`, `Flight Deck`) VALUES ($_POST[`DATE`], $_POST[`MSN`], $_POST[`AC`], $_POST[`MCC`], $_POST[`tail`], $_POST[`actual`], $_POST[`comments`])";

if ($conn->query($sql) == TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
