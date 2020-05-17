<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "CwFq9Xrn3Lvp";
//$password = "Hif7kMb8dKuPP7";
$dbname = "mercerafb";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
 if ($conn->connect_error) {
     die("The Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT TID, FirstName, FavColor FROM TestTable";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
             while($row = $result->fetch_assoc()) {
                     echo "id: " . $row["TID"]. " - Name: " . $row["FirstName"]. " FavColor " . $row["FavColor"]. "<br>";
                         }
                         } else {
                             echo "0 results";
                             }

$sql = "INSERT INTO TestTable (FirstName, FavColor, FavNum, TID) VALUES ('John', 'Black', 123, NULL);";

if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	    }

$conn->close();

?>

</body>
</html>
