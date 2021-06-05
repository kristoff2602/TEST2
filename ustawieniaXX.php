<?php
session_start(); 


//if(!isset($_POST['pass']))

//{
//   header('Location:index.php');
  
//  exit();    
//}
/////żeby opanować technikę logowania się na tej stronie będę prawdopodobnie musiał wykorzystać AJAX i jQuery. Dlaczego?
////Dlatego, że:"aktualizację stron internetowych poprzez wymianę danych z serwerem sieciowym za kulisami"
////2. Obiekt XMLHttpRequest jest tworzony przez JavaScript
///3. Obiekt XMLHttpRequest wysyła żądanie do serwera WWW
////4. Serwer przetwarza żądanie
////5. Serwer wysyła odpowiedź z powrotem do strony internetowej
/////6. Odpowiedź jest czytana przez JavaScript
/////7. Właściwe działanie (takie jak aktualizacja strony) jest wykonywane przez JavaScript
/////

/////wykonaj połaczenie////
require_once "myconnect.php";
// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/////połaczenie_koniec///////

////odczyt hasła z bazy danych_początek///
$sql = "SELECT passw FROM sterowanie WHERE idSterowania=1";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $haslo2 = $row['passw'];
 $result -> free_result();
//////odczyt hasła z bazy danych_koniec///

//$logg2=$_POST['pass'];
//if($logg2<>$haslo2)
//{
// header('Location:index.php');
// exit(); }






?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>

</head>
<body>



<h3>Wybierz zadania do testu20X</h3>
<div style="background-color: lightblue ;">
	<form  action="ustawieniaFin.php" method="post" > 
		zadanie1: 
		<input type="text" name="zada1" value= "0"  />	
			<br /><br />
		zadanie2: 
		<input type="text" name="zada2" value= "0" />
			<br /><br />
		zadanie3: 
		<input type="text" name="zada3" value= "0"/>
			<br /><br />	
		zadanie4: 
		<input type="text" name="zada4" value= "0" />
			<br /><br />	
		zadanie5: 
		<input type="text" name="zada5" value= "0" />
			<br /><br />	
		zadanie6: 
		<input type="text" name="zada6" value= "0"/>
			<br /><br />	
		zadanie7: 
		<input type="text" name="zada7" value= "0" />
			<br /><br />
		zadanie8: 
		<input type="text" name="zada8" value= "0" />
			<br /><br />	
		zadanie9: 
		<input type="text" name="zada9"value= "0" />
			<br /><br />	
		zadanie10: 
		<input type="text" name="zada10"  value= "0"/>
			<br /><br />	
		zadanie11: 
		<input type="text" name="zada11" value= "0" />	
			<br /><br />
		zadanie12: 
		<input type="text" name="zada12" value= "0" />
			<br /><br />
		zadanie13: 
		<input type="text" name="zada13" value= "0" />
			<br /><br />	
		zadanie14: 
		<input type="text" name="zada14" value= "0"  />
			<br /><br />	
		zadanie15: 
		<input type="text" name="zada15"  value= "0"/>
			<br /><br />	
		zadanie16: 
		<input type="text" name="zada16" value= "0" />
			<br /><br />	
		zadanie17: 
		<input type="text" name="zada17" value= "0" />
			<br /><br />
		zadanie18: 
		<input type="text" name="zada18"  value= "0"/>
			<br /><br />	
		zadanie19: 
		<input type="text" name="zada19"  value= "0"/>
			<br /><br />	
		zadanie20: 
		<input type="text" name="zada20" value= "0"/>
			<br /><br />	
			
		<input type="submit" value="wyślij" />
	</form>
</div>

<br><br>


<div>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="text" id="noweha" name="noweha" required>
<input type="submit" style="font-size:50px; background-color: #b3ff66; color:black;" value="podaj nowe hasło na stronę index"style="font-size:30px;"/><br><br><br>
</form>
<?php
////wpisanie nowego hasla do bazy danych////

if(isset($_POST['noweha'])){
$noweha= $_POST['noweha'];


$sql = "UPDATE sterowanie  SET haslo = '$noweha' WHERE idSterowania = 1;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}   
}

?>


</div>
<div>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name='ddd' style="font-size:50px; background-color: gold; color:black;" value="wyzerujKolumnę_czyZalogowany(tabela_uczniowie) i wszystkie_odpowiedzi(tabela_odpowiedzi_etc)"style="font-size:30px;"/><br><br><br>
</form>

<?php
////zerowanie  kolumny czyZalogowany w tabeli uczniowie_początek////
//////czyszczenie w pętli
if(isset($_POST['ddd'])){
for ($x = 0; $x <= 25; $x++) {
$sql = "UPDATE uczniowie  SET czyZalogowany = '0' WHERE idUcznia = $x;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}   
}
}
////zerowanie  kolumny czyZalogowany w tabeli uczniowie_koniec////
///zerowanie kolumn zad1odp...zad20odp,sumaPunktow  w tabeli odpowiedzi_testu20_początek//// 
if(isset($_POST['ddd'])){
for ($x = 0; $x <= 25; $x++) {
$sql = "UPDATE odpowiedzi_testu20 SET zad1odp = '0',zad2odp='0',zad3odp='0',zad4odp='0',zad5odp='0',zad6odp='0',zad7odp='0',zad8odp='0',zad9odp='0',zad9odp='0',zad10odp='0',zad11odp = '0',zad12odp = '0',zad13odp = '0',zad14odp = '0',zad15odp = '0',zad16odp = '0',zad17odp = '0',zad18odp = '0',zad19odp = '0',zad20odp = '0',sumaPunktow = '0',sumaP = '0' WHERE idUcznia = $x;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}   
}
}



///zerowanie kolumn zad1odp...zad20odp w tabeli odpowiedzi_testu20_koniec////
?>
<?php
 
  
    

?>
</div>
<div>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name='aaa' style="font-size:50px; background-color: green; color:white;" value="OtwórzTEST/ nie wyswietlaj wyników dla uczniów"style="font-size:30px;"/><br><br><br>
</form>

 <?php
 
if(isset($_POST['aaa'])){  
$sql = "UPDATE sterowanie  SET wyswietlWyniki = '0' WHERE idSterowania= 1;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
?>
</div>

<div>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name='ccc' style="font-size:50px; background-color: blue; color:white;" value="ZakończTest/WyswietlWynikiDlaUczniów"/><br><br><br>
</form>

 <?php
if(isset($_POST['ccc'])) 
{ 
$sql = "UPDATE sterowanie  SET wyswietlWyniki = '1' WHERE idSterowania= 1;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
?>

</div>
<div>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name='bbb' style="font-size:50px; background-color: red; color:white;" value="wyswietlWynikiDlaMnie"/>
</form>

</div><br><br>
<?php



if(isset($_POST['bbb']))
{

///// początek wyświetlenia wyników//////
for ($x = 1; $x <= 25; $x++) {

$sql = "SELECT sumaPunktow FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20=$x";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $sumaPkt = $row['sumaPunktow'];
echo"<p  class= 'zadania_y'> Suma punktów dla ucznia nr $x wynosi $sumaPkt / ocena końcowa:</p><br>";
 $result -> free_result();
}
}

///// koniec wyświetlenia wyników//////
?>
<div>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" name='fff' style="font-size:50px; background-color: #aa80ff; color:white;" value="wyświetlStatystykęDlaMnie_AWARYJNIE"/>
</form>
<?php

if(isset($_POST['fff']))

{ 
////ustaw kolumnę statystyka-początek
$sql = "UPDATE sterowanie  SET statystyka = '1' WHERE idSterowania= '1';";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}  

////ustaw kolumnę statystyka-koniec


////////początek odpowiedzi prawidłowe z testu test20X    
$sql = "SELECT odpPrawidlowa FROM test20X";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$i=0;
while($row = $result -> fetch_row())
{
 $tabPrX[$i] = $row[0];
 ///echo "<br>  ". $tabPrX[$i].   "<br>";
 $i++;
}
}
else
{
  echo "0 results";
}

$result -> free_result();
//////////koniec odpowiedzi prawidłowe z testu test20X
////////początek odpowiedzi prawidłowe z testu test20Y    
$sql = "SELECT odpPrawidlowa FROM test20Y";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$i=0;
while($row = $result -> fetch_row())
{
 $tabPrY[$i] = $row[0];
 ///echo "<br>  ". $tabPrY[$i].   "<br>";
 $i++;
}
}
else
{
  echo "0 results";
}
 echo "<br> <br>";
$result -> free_result();
//////////koniec odpowiedzi prawidłowe z testu test20Y
////////początek odpowiedzi prawidłowe z testu test20Z    
$sql = "SELECT odpPrawidlowa FROM test20Z";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$i=0;
while($row = $result -> fetch_row())
{
 $tabPrZ[$i] = $row[0];
/// echo "<br>  ". $tabPrZ[$i].   "<br>";
 $i++;
}
}
else
{
  echo "0 results";
}

$result -> free_result();
//////////koniec odpowiedzi prawidłowe z testu test20Z

///////

for ($k = 1; $k <= 25; $k++) 
{
////////początek odpowiedzi ucznia nr k    
$sql = "SELECT * FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20='$k'";
$result = $conn->query($sql);
$row = $result->fetch_row();
for ($x = 0; $x <= 19; $x++) {
$tabOdp[$x]=$row[$x+2];    

}
$result -> free_result();
////////koniec odpowiedzi ucznia nr k  

if ($k==1 or $k==4 or $k==7 or $k==10 or $k==13 or $k==16 or $k==19 or $k==22 or $k==25 )
{
$sumaP=0;    
for ($i= 0; $i <= 19; $i++)    
{
if($tabOdp[$i]==$tabPrX[$i]){$sumaP=$sumaP+1;}
}    
$sql = "UPDATE odpowiedzi_testu20  SET sumaP = '$sumaP' WHERE id_odpowiedzi_testu20= '$k';";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}    
}   
/////początek  dla Y  
if ($k==2 or $k==5 or $k==8 or $k==11 or $k==14 or $k==17 or $k==20 or $k==23  )
{
$sumaP=0;    
for ($j = 0; $j <= 19; $j++)    
{
if($tabOdp[$j]==$tabPrY[$j]){$sumaP=$sumaP+1;}
}    
$sql = "UPDATE odpowiedzi_testu20  SET sumaP = '$sumaP' WHERE id_odpowiedzi_testu20= '$k';";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}    
}  
////// 
if ($k==3 or $k==6 or $k==9 or $k==12 or $k==15 or $k==18 or $k==21 or $k==24  )
{
$sumaP=0;    
for ($m = 0; $m <= 19; $m++)    
{
if($tabOdp[$m]==$tabPrZ[$m]){$sumaP=$sumaP+1;}
}    
$sql = "UPDATE odpowiedzi_testu20  SET sumaP = '$sumaP' WHERE id_odpowiedzi_testu20= $k;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    

}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}    
} 
//////
}
////
for ($x = 1; $x <= 25; $x++) {

$sql = "SELECT sumaP FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20=$x";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $sumaPk = $row['sumaP'];
echo"<p  class= 'zadania_y'> SumaP dla ucznia nr $x wynosi $sumaPk / ocena końcowa:</p><br>";
 $result -> free_result();
}
////
}


?>
</div>

<?php
 $conn->close();
?>


</body>
</html>