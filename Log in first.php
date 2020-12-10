<?php
$host="localhost";
$user="root";
$password="";
$db="electricity_bill_managment_system";
$conn= mysqli_connect($host,$user,$password,$db);
if(!$conn){
	die("Cennected failed: ".mysqli_connect_error());
	mysqli_ping($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log in page</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
div.button,#button{position:relative;left:450px;top:130px;font-size:30px;padding:5px;}
	</style>
	
</head>
<body>
<div class="button"><button id="button" type="button" onclick="location.href='Index page.php'">Log in</button></div>

<p ><u><h1 style="text-align:center; font-size:60px">You must log in first!</h1></u></p>

</body>

</html>