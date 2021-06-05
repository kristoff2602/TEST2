<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>
<style>
 #subm
 {
font-size:50px;	 
 } 
#haslo
{
font-size:50px;
}
#lab
{
font-size:50px;
}
</style>
</head>
<body>

<br><br>
<div style=" background-color:lightblue;">
<h1>
Witaj  w aplikacji TEST. Wpisz hasło  i wciśnij "Wyślij hasło".<br> 
Dalsze instrukcje otrzymasz po wysłaniu hasła.<br>
</h1>

<form  action="<?php echo "logujPocz.php"; ?>" method="post"> 

<label id="lab" >hasło</label>  <input id ="haslo" type="password" name="haslo" required><br><br>
  <input id= "subm" type="submit" name="input1"  value="wyślij hasło"/><br>
 
 </form>

 </div>
 

</body>
</html>