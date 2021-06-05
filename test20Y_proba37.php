<?php
session_start();




if(!isset($_SESSION['haslo']))
{
   header("Location: index.php", true, 301);
 
   exit();    
}
else{}


echo "<h1>".'Twój test ma numer: '.$_SESSION['bea']."</h1>"; 
$mybea = $_SESSION['bea'];
 
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style >
.zadania_x
{
 background-color: green;
 color: white;	
 font-size:25px;	
}
.zadania_y
{
background-color: #b3d9ff;
font-size:22px;
font-weight:bold;
}

.zadania_z 
{

 color: black;	
 font-size:30px;
font-weight:bold; 
}
input[type=radio]
{
height:30px;	
 width: 30px;
 border-radius: 50%;   
}
.hallo
{background-color: gold;}


</style >
</head>
<body>
<?php

require_once "myconnect.php";
// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
?>
<img src='obrazki/punktacja.jpg' alt='Punktacja' style='max-width:100%;height:auto;font-size:10px;'><br><br>
<a style="font-size:30px;" href="index.php">wyloguj</a><br><br><br>
<button style="font-size:30px; background-color: red; color:white;" type="submit" formmethod="post" form="form1" name="submit20Y"  id="myButton"  onclick="myFunction()" >Zakończ test</button><br>


<!-- 

-->
<?php
///odczyt sygnału sterującego $ster początek////
 $sql = "SELECT wyswietlWyniki FROM sterowanie WHERE idSterowania = 1 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
$ster = $row['wyswietlWyniki'];
if($ster==0)
{
echo"<p  class= 'zadania_y'>TEST jest otwarty, rozwiązuj zadania </p>";    
}
else
{
echo"<p  class= 'zadania_y'>TEST jest zamknięty, odczytaj wyniki </p>";    
}
 $result -> free_result();
///odczyt sygnału sterującego $ster koniec////
////sprawdzenie czy button "Zakończ TEST" został wciśnięty i podjęcie akcji odczytu przycisków  typu radio (wszystkie  przyciski są w jednej formie//////
if(isset($_POST['submit20Y']) ) 
{ 
   
  
   $odpZad1 = $_POST['zad1']; $odpZad2 = $_POST['zad2']; $odpZad3 = $_POST['zad3'];$odpZad4 = $_POST['zad4']; $odpZad5 = $_POST['zad5']; $odpZad6 = $_POST['zad6']; $odpZad7 = $_POST['zad7']; $odpZad8 = $_POST['zad8']; $odpZad9 = $_POST['zad9']; $odpZad10 = $_POST['zad10']; 
  $odpZad11 = $_POST['zad11']; $odpZad12 = $_POST['zad12']; $odpZad13 = $_POST['zad13']; $odpZad14 = $_POST['zad14']; $odpZad15 = $_POST['zad15']; $odpZad16 = $_POST['zad16']; $odpZad17 = $_POST['zad17']; $odpZad18 = $_POST['zad18']; $odpZad19 = $_POST['zad19']; $odpZad20 = $_POST['zad20'];
 
 
 
}

?>

<!--
XXXXXXXpoczątek  obsługi zadania 1_XXXXXXXXXXXX
-->

<h3 class="zadania_x" >Zadanie1</h3><br>
<?php
////wczytanie trec zadania/////
$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 1 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();
 
////wczytanie trec zadania/////
////wczytanie adresu obrazka  zadania/////
$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 1 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture1' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
////wczytanie adresu obrazka  zadania/////

/////do skopiowania frag1_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 1 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>

<form  class="zadania_z"  id ="form1"method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<div class="hallo">

A.<input  type="radio" name="zad1" value="A"<?php if (isset($odpZad1) && $odpZad1=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad1" value="B"<?php if (isset($odpZad1) && $odpZad1=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad1" value="C"<?php if (isset($odpZad1) && $odpZad1=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad1" value="D"<?php if (isset($odpZad1) && $odpZad1=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad1"value="0"<?php if (!isset($odpZad1)) echo 'checked';?> ><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad1, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad1odp = '$odpZad1' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad1_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
 $suma = 0;    
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 1////////    
 $sql = "SELECT zad1odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad1_odpo = $row['zad1odp'];
 $result -> free_result(); 

////////////// 
if($zad1_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>TEST zakończył się  </p>"; 
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad1_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment1_koniec////////


?>

<!--
XXXXXXkoniec  obsługi zadania 1_XXXX
-->
<!--
XXXXXXXpoczątek obsługi  zadania 2_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie2</h3><br>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 2 AND all_zadania.idZadania=test20Y.idZadania";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 2 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture2' style='max-width:100%;height:auto;font-size:10px;'><br>";
 $result -> free_result();
 
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 2 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad2" value="A"<?php if (isset($odpZad2) && $odpZad2=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad2" value="B"<?php if (isset($odpZad2) && $odpZad2=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad2" value="C"<?php if (isset($odpZad2) && $odpZad2=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad2" value="D"<?php if (isset($odpZad2) && $odpZad2=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad2"value="0"<?php if (!isset($odpZad2)) echo 'checked';?> ><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad2, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad2odp = '$odpZad2' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 2////////    
 $sql = "SELECT zad2odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad2_odpo = $row['zad2odp'];
 $result -> free_result(); 

////////////// 
if($zad2_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad2_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>
<!--
XXXXXXkoniec zadania 2_XXXX
-->
<!--
XXXXXXXpoczątek zadania 3_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie3</h3><br>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 3 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();
 
$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 3 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture3' style='max-width:100%;height:auto;font-size:10px;'><br>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 3 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad3" value="A"<?php if (isset($odpZad3) && $odpZad3=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad3" value="B"<?php if (isset($odpZad3) && $odpZad3=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad3" value="C"<?php if (isset($odpZad3) && $odpZad3=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad3" value="D"<?php if (isset($odpZad3) && $odpZad3=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad3"value="0"<?php if (!isset($odpZad3)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad3, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad3odp = '$odpZad3' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 3////////    
 $sql = "SELECT zad3odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad3_odpo = $row['zad3odp'];
 $result -> free_result(); 

////////////// 
if($zad3_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad3_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>
<!--
XXXXXXkoniec zadania 3_XXXX
-->

<!--
XXXXXXXpoczątek zadania 4_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie4</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 4 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 4 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture4' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 4 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad4" value="A"<?php if (isset($odpZad4) && $odpZad4=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad4" value="B"<?php if (isset($odpZad4) && $odpZad4=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad4" value="C"<?php if (isset($odpZad4) && $odpZad4=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad4" value="D"<?php if (isset($odpZad4) && $odpZad4=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad4"value="0"<?php if (!isset($odpZad4)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad4, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad4odp = '$odpZad4' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 4////////    
 $sql = "SELECT zad4odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad4_odpo = $row['zad4odp'];
 $result -> free_result(); 

////////////// 
if($zad4_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad4_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>
<!--
XXXXXXkoniec zadania 4_XXXX
-->
<!--
XXXXXXXpoczątek zadania 5 XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie5</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 5 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 5 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture5' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 5 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad5" value="A"<?php if (isset($odpZad5) && $odpZad5=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad5" value="B"<?php if (isset($odpZad5) && $odpZad5=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad5" value="C"<?php if (isset($odpZad5) && $odpZad5=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad5" value="D"<?php if (isset($odpZad5) && $odpZad5=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad5"value="0"<?php if (!isset($odpZad5)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad5, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad5odp = '$odpZad5' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 2////////    
 $sql = "SELECT zad5odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad5_odpo = $row['zad5odp'];
 $result -> free_result(); 

////////////// 
if($zad5_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad5_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 5_XXXX
-->

<!--
XXXXXXXpoczątek zadania 6 XXXXXXXXXXXX
-->


<h3  class="zadania_x">Zadanie6</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 6 AND all_zadania.idZadania=test20Y.idZadania";

//////dod//



///////odo///
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 6 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture6' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 6 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad6" value="A"<?php if (isset($odpZad6) && $odpZad6=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad6" value="B"<?php if (isset($odpZad6) && $odpZad6=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad6" value="C"<?php if (isset($odpZad6) && $odpZad6=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad6" value="D"<?php if (isset($odpZad6) && $odpZad6=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad6"value="0"<?php if (!isset($odpZad6)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad6, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad6odp = '$odpZad6' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 6////////    
 $sql = "SELECT zad6odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad6_odpo = $row['zad6odp'];
 $result -> free_result(); 

////////////// 
if($zad6_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad6_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 6_XXXX
-->

<!--
XXXXXXXpoczątek zadania 7_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie7</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 7 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 7 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture7' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
 
 /////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 7 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad7" value="A"<?php if (isset($odpZad7) && $odpZad7=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad7" value="B"<?php if (isset($odpZad7) && $odpZad7=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad7" value="C"<?php if (isset($odpZad7) && $odpZad7=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad7" value="D"<?php if (isset($odpZad7) && $odpZad7=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad7"value="0"<?php if (!isset($odpZad7)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad5, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad7odp = '$odpZad7' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
///echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 2////////    
 $sql = "SELECT zad7odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad7_odpo = $row['zad7odp'];
 $result -> free_result(); 

////////////// 
if($zad7_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad7_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 7_XXXX
-->

<!--
XXXXXXXpoczątek zadania 8_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie8</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 8 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 8 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture8' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 8 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad8" value="A"<?php if (isset($odpZad8) && $odpZad8=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad8" value="B"<?php if (isset($odpZad8) && $odpZad8=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad8" value="C"<?php if (isset($odpZad8) && $odpZad8=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad8" value="D"<?php if (isset($odpZad8) && $odpZad8=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad8"value="0"<?php if (!isset($odpZad8)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad8, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad8odp = '$odpZad8' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad8_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 8////////    
 $sql = "SELECT zad8odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad8_odpo = $row['zad8odp'];
 $result -> free_result(); 

////////////// 
if($zad8_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad8_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 8_XXXX
-->

<!--
XXXXXXXpoczątek zadania 9_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie9</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 9 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 9 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture9' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 9 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad9" value="A"<?php if (isset($odpZad9) && $odpZad9=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad9" value="B"<?php if (isset($odpZad9) && $odpZad9=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad9" value="C"<?php if (isset($odpZad9) && $odpZad9=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad9" value="D"<?php if (isset($odpZad9) && $odpZad9=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad9"value="0"<?php if (!isset($odpZad9)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad5, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad9odp = '$odpZad9' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 2////////    
 $sql = "SELECT zad9odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad9_odpo = $row['zad9odp'];
 $result -> free_result(); 

////////////// 
if($zad9_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad9_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 9_XXXX
-->
<!--
XXXXXXXpoczątek zadania 10_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie10</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 10 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 10 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture10' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 10 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad10" value="A"<?php if (isset($odpZad10) && $odpZad10=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad10" value="B"<?php if (isset($odpZad10) && $odpZad10=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad10" value="C"<?php if (isset($odpZad10) && $odpZad10=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad10" value="D"<?php if (isset($odpZad10) && $odpZad10=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad10"value="0"<?php if (!isset($odpZad10)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad10odp = '$odpZad10' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad10odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad10_odpo = $row['zad10odp'];
 $result -> free_result(); 

////////////// 
if($zad10_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad10_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 10_XXXX
-->
<!--
XXXXXXXpoczątek zadania 11_XXXXXXXXXXXX
-->

<h3 class="zadania_x" >Zadanie11</h3><br>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 11 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();


$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 11 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture11' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 11 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad11" value="A"<?php if (isset($odpZad11) && $odpZad11=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad11" value="B"<?php if (isset($odpZad11) && $odpZad11=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad11" value="C"<?php if (isset($odpZad11) && $odpZad11=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad11" value="D"<?php if (isset($odpZad11) && $odpZad11=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad11"value="0"<?php if (!isset($odpZad11)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad11, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad11odp = '$odpZad11' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad11_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 11////////    
 $sql = "SELECT zad11odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad11_odpo = $row['zad11odp'];
 $result -> free_result(); 

////////////// 
if($zad11_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad11_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 11_XXXX
-->
<!--
XXXXXXXpoczątek zadania 12_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie12</h3><br>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 12 AND all_zadania.idZadania=test20Y.idZadania";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 12 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture12' style='max-width:100%;height:auto;font-size:10px;'><br>";
 $result -> free_result();

 /////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 12 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad12" value="A"<?php if (isset($odpZad12) && $odpZad12=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad12" value="B"<?php if (isset($odpZad12) && $odpZad12=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad12" value="C"<?php if (isset($odpZad12) && $odpZad12=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad12" value="D"<?php if (isset($odpZad12) && $odpZad12=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad12"value="0"<?php if (!isset($odpZad12)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad12odp = '$odpZad12' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad12_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad12odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad12_odpo = $row['zad12odp'];
 $result -> free_result(); 

////////////// 
if($zad12_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad12_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?> 
  
<!--
XXXXXXkoniec zadania 12_XXXX
-->
<!--
XXXXXXXpoczątek zadania 13_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie13</h3><br>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 13 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();
 
$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 13 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture13' style='max-width:100%;height:auto;font-size:10px;'><br>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 13 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad13" value="A"<?php if (isset($odpZad13) && $odpZad13=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad13" value="B"<?php if (isset($odpZad13) && $odpZad13=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad13" value="C"<?php if (isset($odpZad13) && $odpZad13=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad13" value="D"<?php if (isset($odpZad13) && $odpZad13=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad13"value="0"<?php if (!isset($odpZad13)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad13odp = '$odpZad13' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad13odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad13_odpo = $row['zad13odp'];
 $result -> free_result(); 

////////////// 
if($zad13_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad13_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 13_XXXX
-->

<!--
XXXXXXXpoczątek zadania 14_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie14</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 14 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 14 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture14' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 14 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad14" value="A"<?php if (isset($odpZad14) && $odpZad14=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad14" value="B"<?php if (isset($odpZad14) && $odpZad14=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad14" value="C"<?php if (isset($odpZad14) && $odpZad14=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad14" value="D"<?php if (isset($odpZad14) && $odpZad14=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad14"value="0"<?php if (!isset($odpZad14)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad14odp = '$odpZad14' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad14odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad14_odpo = $row['zad14odp'];
 $result -> free_result(); 

////////////// 
if($zad14_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad14_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>
<!--
XXXXXXkoniec zadania 14_XXXX
-->
<!--
XXXXXXXpoczątek zadania 15 XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie15</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 15 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 15 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture15' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 15 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad15" value="A"<?php if (isset($odpZad15) && $odpZad15=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad15" value="B"<?php if (isset($odpZad15) && $odpZad15=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad15" value="C"<?php if (isset($odpZad15) && $odpZad15=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad15" value="D"<?php if (isset($odpZad15) && $odpZad15=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad15"value="0"<?php if (!isset($odpZad15)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad15odp = '$odpZad15' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad15odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad15_odpo = $row['zad15odp'];
 $result -> free_result(); 

////////////// 
if($zad15_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad15_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>



<!--
XXXXXXkoniec zadania 15_XXXX
-->

<!--
XXXXXXXpoczątek zadania 16 XXXXXXXXXXXX
-->


<h3  class="zadania_x">Zadanie16</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 16 AND all_zadania.idZadania=test20Y.idZadania";

//////dod//



///////odo///
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 16 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture16' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 16 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad16" value="A"<?php if (isset($odpZad16) && $odpZad16=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad16" value="B"<?php if (isset($odpZad16) && $odpZad16=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad16" value="C"<?php if (isset($odpZad16) && $odpZad16=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad16" value="D"<?php if (isset($odpZad16) && $odpZad16=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad16"value="0"<?php if (!isset($odpZad16)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad16odp = '$odpZad16' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad16odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad16_odpo = $row['zad16odp'];
 $result -> free_result(); 

////////////// 
if($zad16_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad16_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 16_XXXX
-->

<!--
XXXXXXXpoczątek zadania 17_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie17</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 17 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 17 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture17' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 17 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad17" value="A"<?php if (isset($odpZad17) && $odpZad17=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad17" value="B"<?php if (isset($odpZad17) && $odpZad17=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad17" value="C"<?php if (isset($odpZad17) && $odpZad17=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad17" value="D"<?php if (isset($odpZad17) && $odpZad17=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad17"value="0"<?php if (!isset($odpZad17)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad17odp = '$odpZad17' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad17odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad17_odpo = $row['zad17odp'];
 $result -> free_result(); 

////////////// 
if($zad17_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad17_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 17_XXXX
-->

<!--
XXXXXXXpoczątek zadania 18_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie18</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 18 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 18 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture18' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 18 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad18" value="A"<?php if (isset($odpZad18) && $odpZad18=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad18" value="B"<?php if (isset($odpZad18) && $odpZad18=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad18" value="C"<?php if (isset($odpZad18) && $odpZad18=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad18" value="D"<?php if (isset($odpZad18) && $odpZad18=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad18"value="0"<?php if (!isset($odpZad18)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad18odp = '$odpZad18' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad18odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad18_odpo = $row['zad18odp'];
 $result -> free_result(); 

////////////// 
if($zad18_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad18_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 18_XXXX
-->

<!--
XXXXXXXpoczątek zadania 19_XXXXXXXXXXXX
-->
<h3  class="zadania_x">Zadanie19</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 19 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 19 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture19' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();
 
/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y = 19 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad19" value="A"<?php if (isset($odpZad19) && $odpZad19=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad19" value="B"<?php if (isset($odpZad19) && $odpZad19=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad19" value="C"<?php if (isset($odpZad19) && $odpZad19=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad19" value="D"<?php if (isset($odpZad19) && $odpZad19=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad19"value="0"<?php if (!isset($odpZad19)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad19odp = '$odpZad19' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad2_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 10////////    
 $sql = "SELECT zad19odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad19_odpo = $row['zad19odp'];
 $result -> free_result(); 

////////////// 
if($zad19_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad19_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>

<!--
XXXXXXkoniec zadania 19_XXXX
-->
<!--
XXXXXXXpoczątek zadania 20_XXXXXXXXXXXX
-->

<h3  class="zadania_x">Zadanie20</h3>
<?php

$sql = "SELECT all_zadania.tekstZadania FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 20 AND all_zadania.idZadania=test20Y.idZadania";

$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $tekstZ = $row['tekstZadania'];
echo"<p  class= 'zadania_y'> $tekstZ</p><br>";
 $result -> free_result();

$sql = "SELECT all_zadania.adresObrazka FROM all_zadania, test20Y WHERE test20Y.idTestu20Y = 20 AND all_zadania.idZadania=test20Y.idZadania"; 
 
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $adresO = $row['adresObrazka'] ;
 echo"<img src=' $adresO' alt='Picture20' style='max-width:100%;height:auto;font-size:10px;'>";
 $result -> free_result();

/////do skopiowania frag2_pocz//////// 
 
////wczytanie prawidłowej odpowiedzi  zadania/////
 $sql = "SELECT odpPrawidlowa FROM test20Y WHERE idTestu20Y= 20 ;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $odPraw = $row['odpPrawidlowa'];
 $result -> free_result();
////wczytanie prawidłowej odpowiedzi  zadania/////
 
 
?>


<div class="hallo">

A.<input  type="radio" name="zad20" value="A"<?php if (isset($odpZad20) && $odpZad20=="A")echo 'checked';?>><br>
B.<input  type="radio" name="zad20" value="B"<?php if (isset($odpZad20) && $odpZad20=="B")echo 'checked';?>><br>
C.<input  type="radio" name="zad20" value="C"<?php if (isset($odpZad20) && $odpZad20=="C")echo 'checked';?>><br>
D.<input  type="radio" name="zad20" value="D"<?php if (isset($odpZad20) && $odpZad20=="D")echo 'checked';?>>
<input  style=" visibility: hidden;" type="radio" name="zad20"value="0"<?php if (!isset($odpZad20)) echo 'checked';?>><br>
</div>

<?php

///pocz wyświetlenie odpowiedzi  ucznia na zad10, przepisanie zawartości przycisków radio tyko wtedy gdy $ster==0_/////
if(isset($_POST['submit20Y']) and $ster == '0')

{
	
$sql = "UPDATE odpowiedzi_testu20  SET zad20odp = '$odpZad20' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";	
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
}
///koniec  wpisania odpowiedzi  ucznia na zad20_/////  

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -początek//////////

//// początek _ liczenie wyników//// 
////po zablokowaniu testu tj.  $ster==1////
if(isset($_POST['submit20Y'])and  $ster =='1')
{
 ///na początku liczenia punktów za zadania ich suma jest równa 0/////   
  
    
///odczytuję z bazy danych odpowiedź ucznia $mybea na zadanie 20////////    
 $sql = "SELECT zad20odp FROM odpowiedzi_testu20 WHERE id_odpowiedzi_testu20 =$mybea;";
$result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $zad20_odpo = $row['zad20odp'];
 $result -> free_result(); 

////////////// 
if($zad20_odpo==$odPraw){
$punkt = 1;     
$suma = $suma+1; 
 }
 else{
$punkt=0;	 
 }
///// 
 $sql = "UPDATE odpowiedzi_testu20  SET sumaPunktow = '$suma' WHERE id_odpowiedzi_testu20=$mybea;";
if (mysqli_query($conn, $sql)) 
{
//echo"New record updated successfully";    
}
else 
{
 echo "Error: " . $sql. "<br>" . mysqli_error($conn);
}
 
 
 //// koniec _ liczenie wyników////    
    
 
 /////  początek_wyświetanie wyników///
echo"<p  class= 'zadania_y'>uczeń numer: $mybea wybrał odpowiedź:  $zad20_odpo</p>"; 
echo"<p  class= 'zadania_y'>odpowiedź prawidłowa: $odPraw</p>";
echo"<p  class= 'zadania_y'>uczeń nr : $mybea zdobywa: $punkt</p>";
echo"<p  class= 'zadania_y'> aktualna suma punktów dla ucznia nr:$mybea wynosi:$suma </p>"; 
 ///// koniec_wyświetanie wyników/// 

}

/////LICZENIE PUNKTÓW I WYŚWIETLANIE WYNIKÓW -koniec//////////

//////do skopiowania_fragment2_koniec////////
?>


<!--
XXXXXXkoniec zadania 20_XXXX
-->
</form>

<?php
 $conn->close();
?>

<img src='obrazki/punktacja.jpg' alt='Punktacja' style='max-width:100%;height:auto;font-size:10px;'><br><br>
<h4 style= " background-color: #ccff99 ;">opracował: Krzysztof Golański /luty 2020</h5>


</body>
</html>