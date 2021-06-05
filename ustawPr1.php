<?php
/////wykonaj połaczenie////
require_once "myconnect.php";
// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/////połaczenie_koniec///////


$sql = "UPDATE sterowanie  SET proba1 = '1' WHERE idSterowania = 1;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}  

 $conn->close();













?>