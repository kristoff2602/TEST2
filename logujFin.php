<?php
// Start the session
session_start();
if(!isset($_SESSION['haslo']))
{
   header("Location: index.php", true, 301);
  
   exit();    
}




$_SESSION['bea']=$_POST['numerKarty'];
////
$beac=$_SESSION['bea'];
/////połaczenie  -początek////
require_once "myconnect.php";
// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/////////połaczenie_koniec////
/////odczyt z bazy danych stanu zalogowania_początek////


 $sql = "SELECT czyZalogowany FROM uczniowie WHERE idUcznia = $beac ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
$czyZ = $row['czyZalogowany'];
$_SESSION['czyZ']=$czyZ;
if($czyZ==1)
{
header("Location:index.php", true, 301);
exit();
}    

else
{
/////wpisz 1 do bazy danych(tabela uczniowie, kolumna czyZalogowany) i przekieruj na odpowiednią stronę testu_ początek/////
$sql = "UPDATE uczniowie  SET czyZalogowany = '1' WHERE idUcznia = $beac;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
/////
if($_SESSION['bea']==1 or $_SESSION['bea']==4 or $_SESSION['bea']==7 or $_SESSION['bea']==10 or $_SESSION['bea']==13 or $_SESSION['bea']==16 or $_SESSION['bea']==19 or $_SESSION['bea']==22  or $_SESSION['bea']==25)
{
header("Location: test20X_proba37.php", true, 301);
exit();
}
////
if($_SESSION['bea']==2 or $_SESSION['bea']==5 or $_SESSION['bea']==8 or $_SESSION['bea']==11 or $_SESSION['bea']==14 or $_SESSION['bea']==17 or $_SESSION['bea']==20 or $_SESSION['bea']==23)
{
header("Location: test20Y_proba37.php", true, 301);
exit();

}
/////

if($_SESSION['bea']==3 or $_SESSION['bea']==6 or $_SESSION['bea']==9 or $_SESSION['bea']==12 or $_SESSION['bea']==15 or $_SESSION['bea']==18 or $_SESSION['bea']==21 or $_SESSION['bea']==24)
{
header("Location: test20Z_proba37.php", true, 301);
exit();

}

/////wpisz 1 do bazy danych i przekieruj na odpowiednią stronę testu_ koniec/////
}
 $result -> free_result();


/////odczyt z bazy danych stanu zalogowania _koniec////
///przekierowanie na odpowiedni test_początek //////






?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>

</head>
<body>

</body>
</html>