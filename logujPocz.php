<?php
session_start();

$_SESSION['haslo'] = $_POST['haslo'];

if(!isset($_SESSION['haslo']))
{
   header("Location: index.php", true, 301);
  
   exit();	
}
///////połaczenie_początek///
require_once "myconnect.php";
// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/////połaczenie_koniec///////
////odczyt hasła z bazy danych_początek///
$sql = "SELECT haslo FROM sterowanie WHERE idSterowania=1";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $myhaslo = $row['haslo'];
 $result -> free_result();
//////odczyt hasła z bazy danych_koniec///

$log1=$_POST['haslo'];
if($log1<>$myhaslo)
{
 header("Location:index.php", true, 301);
 exit(); }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>
<style>
 .lit
 {
font-size:50px;	 
 } 
</style>
</head>
<body>

<br><br>
<div style=" background-color:lightblue;">
<h2>
Przepisz numer z  kartki formularza i wciśnij "Prześlij numer".<br> Otworzy się test z dwudziestoma zadaniami.<br>Wyświetlony numer testu powinien być taki sam jaki wpisałeś z karty formularza. <br> Na każde zadanie jest przeznaczone 1,5 minuty.<br> Twoje odpowiedzi zaznaczaj na ekranie.<br> Na koniec przepisz długopisem wybrane odpowiedzi  na  kartę formularza oraz wciśnij "Zakończ test". <br>Powodzenia ! 
</h2>

<form  action="<?php echo "logujFin.php"; ?>" method="post"> 

 <input  class= "lit" type="number" name="numerKarty" min="1" max ="30" size=2 required />
 <input class= "lit" type="submit" value="prześlij numer"/><br>
 
 </form>
 
 </div>
 
 <br><br> 
 





</body>
</html>