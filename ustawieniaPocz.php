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


<form  action="<?php echo "ustawieniaX.php"; ?>" method="post"> 

<label id="lab" >hasło</label>  <input id ="haslo" type="password" name="pass" required><br><br>
  <input id= "subm" type="submit" name="input1"  value="wyślij hasło"/><br>
 
 </form>

 </div>
 

</body>
</html>