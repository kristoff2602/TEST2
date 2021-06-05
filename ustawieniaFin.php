<?php
session_start();
// $haslo = $_SESSION['haslo']; 
//if(!isset($haslo))
//{
//   header("Location: index.php", true, 301);
  
//   exit();    
//}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>
<h3>Podsumowanie ustawienia TESTU20X</h3>




<?php


$zadz2 =$zady4= $zadx1 = $_POST['zada1']; $zadz15= $zady5= $zadx2 = $_POST['zada2']; $zadz17=$zady16= $zadx3 = $_POST['zada3'];
$zadz1=$zady6 = $zadx4 = $_POST['zada4']; $zadz13 = $zady18=  $zadx5 = $_POST['zada5']; $zadz9 =$zady12=  $zadx6 = $_POST['zada6'];
$zadz20=$zady20= $zadx7 = $_POST['zada7'];$zadz16 = $zady8= $zadx8 = $_POST['zada8'];$zadz6 =$zady11=  $zadx9 = $_POST['zada9'];
$zadz11 =$zady13=  $zadx10 = $_POST['zada10'];$zadz12=$zady9=  $zadx11 = $_POST['zada11'];$zadz10= $zady7= $zadx12 = $_POST['zada12'];$zadz4=$zady14=  $zadx13 = $_POST['zada13'];$zadz7=$zady3=  $zadx14 = $_POST['zada14']; $zadz18 =$zady10=  $zadx15 = $_POST['zada15']; $zadz5 =$zady2=  $zadx16 = $_POST['zada16']; $zadz3=$zady1=  $zadx17 = $_POST['zada17'];$zadz14 = $zady19=  $zadx18 = $_POST['zada18'];$zadz19 = $zady17= $zadx19 = $_POST['zada19'];$zadz8= $zady15= $zadx20 = $_POST['zada20'];








echo<<<END

	
	
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>ZADANIE_1</td> <td>$zadx1</td>
	</tr>
	<tr>
		<td>ZADANIE_2</td> <td>$zadx2</td>
	</tr>
	
	</table>


END;

	

require_once "myconnect.php";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	
}

/////pocz1_ustaw_test20X///

$sql = "UPDATE test20X  SET idZadania = $zadx1 WHERE idTestu20X=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx1;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 

////////kon1_ustaw_test20X///////

/////pocz1_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady1 WHERE idTestu20Y=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady1;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon1_ustaw_test20Y///////

/////pocz1_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz1 WHERE idTestu20Z=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz1;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=1;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 


////////kon1_ustaw_test20Z///////

/////pocz2_ustaw_test20X///
$sql = "UPDATE test20X  SET idZadania = $zadx2 WHERE idTestu20X=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx2;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}


//////kon2_ustaw_test20X////

/////pocz2_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady2 WHERE idTestu20Y=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady2;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon2_ustaw_test20Y///////

/////pocz2_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz2 WHERE idTestu20Z=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz2;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=2;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon2_ustaw_test20Z///////


////pocz3_ustaw_test20X/////
$sql = "UPDATE test20X  SET idZadania = $zadx3 WHERE idTestu20X=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx3;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}

/////kon3_ustaw_test20X///


/////pocz3_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady3 WHERE idTestu20Y=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady3;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon3_ustaw_test20Y///////

/////pocz3ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz3 WHERE idTestu20Z=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz3;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=3;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon3_ustaw_test20Z///////


//pocz4_ustaw_test20X/////

$sql = "UPDATE test20X  SET idZadania = $zadx4 WHERE idTestu20X=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx4;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon4_ustaw_test20X///

/////pocz4_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady4 WHERE idTestu20Y=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady4;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon4_ustaw_test20Y///////

/////pocz4_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz4 WHERE idTestu20Z=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz4;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=4;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon4_ustaw_test20Z///////


//pocz5_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx5 WHERE idTestu20X=5;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx5;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=5;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon5_ustaw_test20X///


/////pocz5_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady5 WHERE idTestu20Y=5;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady5;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=5;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon5_ustaw_test20Y///////

/////pocz5_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz5 WHERE idTestu20Z=5;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz5;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=5;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon5_ustaw_test20Z///////




//pocz6_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx6 WHERE idTestu20X=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx6;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon6_ustaw_test20X///


/////pocz6_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady6 WHERE idTestu20Y=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady6;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon6_ustaw_test20Y///////

/////pocz6_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz6 WHERE idTestu20Z=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz6;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=6;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon6_ustaw_test20Z///////


//pocz7_ustaw_test20X/////

$sql = "UPDATE test20X  SET idZadania = $zadx7 WHERE idTestu20X=7;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx7;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=7;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon7_ustaw_test20X///

/////pocz7_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady7 WHERE idTestu20Y=7;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady7;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=7;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon7_ustaw_test20Y///////

/////pocz7_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz7 WHERE idTestu20Z=7;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz7;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=7;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon7_ustaw_test20Z///////

//pocz8_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx8 WHERE idTestu20X=8;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx8;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=8;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon8_ustaw_test20X///

/////pocz8_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady8 WHERE idTestu20Y=8;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady8;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=8;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon8_ustaw_test20Y///////

/////pocz8_ustaw_test20Z///

$sql = "UPDATE test20Z  SET idZadania = $zadz8 WHERE idTestu20Z=8;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz8;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=8;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon8_ustaw_test20Z///////


//pocz9_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx9 WHERE idTestu20X=9;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx9;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=9;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon9_ustaw_test20X///


/////pocz9_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady9 WHERE idTestu20Y=9;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady9;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=9;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon9_ustaw_test20Y///////

/////pocz9_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz9 WHERE idTestu20Z=9;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz9;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=9;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon9_ustaw_test20Z///////

//pocz10_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx10 WHERE idTestu20X=10;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx10;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=10;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon10_ustaw_test20X///

/////pocz10_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady10 WHERE idTestu20Y=10;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady10;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=10;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon10_ustaw_test20Y///////

/////pocz10_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz10 WHERE idTestu20Z=10;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz10;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=10;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon10_ustaw_test20Z///////

/////pocz11_ustaw_test20X///
$sql = "UPDATE test20X  SET idZadania = $zadx11 WHERE idTestu20X=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx11;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 

////////kon11_ustaw_test20X

/////pocz11_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady11 WHERE idTestu20Y=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady11;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon11_ustaw_test20Y///////

/////pocz11_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz11 WHERE idTestu20Z=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz11;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=11;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon11_ustaw_test20Z///////

/////pocz12_ustaw_test20X///
$sql = "UPDATE test20X  SET idZadania = $zadx12 WHERE idTestu20X=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx12;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}


//////kon12_ustaw_test20X////

/////pocz12_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady12 WHERE idTestu20Y=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady12;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon12_ustaw_test20Y///////

/////pocz12_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz12 WHERE idTestu20Z=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz12;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=12;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon12_ustaw_test20Z///////


////pocz13_ustaw_test20X/////
$sql = "UPDATE test20X  SET idZadania = $zadx13 WHERE idTestu20X=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx13;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}

/////kon13_ustaw_test20X///
/////pocz13_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady13 WHERE idTestu20Y=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady13;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon13_ustaw_test20Y///////

/////pocz13_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz13 WHERE idTestu20Z=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz13;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=13;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon13_ustaw_test20Z///////

//pocz14_ustaw_test20X/////

$sql = "UPDATE test20X  SET idZadania = $zadx14 WHERE idTestu20X=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx14;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon14_ustaw_test20X///

/////pocz14_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady14 WHERE idTestu20Y=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady14;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon14_ustaw_test20Y///////

/////pocz14_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz14 WHERE idTestu20Z=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz14;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=14;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon14_ustaw_test20Z///////

//pocz15_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx15 WHERE idTestu20X=15;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx15;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=15;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon15_ustaw_test20X///

/////pocz15_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady15 WHERE idTestu20Y=15;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady15;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=15;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon15_ustaw_test20Y///////

/////pocz15_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz15 WHERE idTestu20Z=15;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz15;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=15;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon15_ustaw_test20Z///////


//pocz16_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx16 WHERE idTestu20X=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx16;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon16_ustaw_test20X///
/////pocz16_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady16 WHERE idTestu20Y=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady16;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon16_ustaw_test20Y///////

/////pocz16_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz16 WHERE idTestu20Z=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz16;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=16;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon16_ustaw_test20Z///////

//pocz17_ustaw_test20X/////

$sql = "UPDATE test20X  SET idZadania = $zadx17 WHERE idTestu20X=17;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx17;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=17;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon17_ustaw_test20X///
/////pocz17_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady17 WHERE idTestu20Y=17;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady17;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=17;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon17_ustaw_test20Y///////

/////pocz17_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz17 WHERE idTestu20Z=17;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz17;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=17;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon17_ustaw_test20Z///////

//pocz18_ustaw_test20X/////

$sql = "UPDATE test20X  SET idZadania = $zadx18 WHERE idTestu20X=18;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx18;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=18;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon18_ustaw_test20X///
/////pocz18_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady18 WHERE idTestu20Y=18;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady18;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=18;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon18_ustaw_test20Y///////

/////pocz18_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz18 WHERE idTestu20Z=18;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz18;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=18;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon18_ustaw_test20Z///////


//pocz19_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx19 WHERE idTestu20X=19;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx19;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=19;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon19_ustaw_test20X///

/////pocz19_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady19 WHERE idTestu20Y=19;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady19;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=19;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon19_ustaw_test20Y///////

/////pocz19_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz19 WHERE idTestu20Z=19;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz19;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=19;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon19_ustaw_test20Z///////
//pocz20_ustaw_test20X/////


$sql = "UPDATE test20X  SET idZadania = $zadx20 WHERE idTestu20X=20;";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadx20;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20X  SET odpPrawidlowa = '$odpPr' WHERE idTestu20X=20;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
}
/////kon20_ustaw_test20X///
/////pocz20_ustaw_test20Y///
$sql = "UPDATE test20Y  SET idZadania = $zady20 WHERE idTestu20Y=20;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zady20;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Y  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Y=20;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon20_ustaw_test20Y///////

/////pocz20_ustaw_test20Z///
$sql = "UPDATE test20Z  SET idZadania = $zadz20 WHERE idTestu20Z=20;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else{
    echo "Error updating record: " . $conn->error;
}
//////////
$sql = "SELECT odpPrawidlowa FROM all_zadania WHERE idZadania =$zadz20;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odpPr = $row['odpPrawidlowa'];
//echo"<p  >$odpPr</p><br>";
 $result -> free_result(); 
 ////////
$sql = "UPDATE test20Z  SET odpPrawidlowa = '$odpPr' WHERE idTestu20Z=20;";
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} 
else 
{
   echo "Error updating record: " . $conn->error;
} 
////////kon20_ustaw_test20Z///////




//////
//object-oriented

$conn->close();
?>



</body>
</html>