<?php
$host="localhost";
$user="root";
$password="";
$db="electricity_bill_managment_system";
$conn= mysqli_connect($host,$user,$password,$db);
if(!$conn){
	die("Cennected failed: ".mysqli_connect_error());
}
session_start();
if($_SESSION["log_state"]==0){

	header("Location:Log in first.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New user form</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
	div {position:absolute;
		padding:10px;
		font-size:30px;
		left:750px;
		top:200px;
		<--border:2px solid black;-->
		align:center;}
	div.button,#button{position:absolute;left:80px;top:20px;font-size:30px;padding:5px;}
	#msg{position:absolute;left:170px;top:120px;font-size:30px;color:rgb(225,225,225);background-color:rgba(44, 62, 80,0.7);padding:20px;}
	#a1	{font-size:30px;
	padding:5px;}
	#a3  {position:absolute;left:1420px;top:50px;font-size:40px;}
	</style>
</head>
<body>
<?php 
	$name=$_GET['name'];

?>
<div id="a3"> Name :  <?php echo $name;?><br></div>
<?php

	
	if(isset($_POST['post'])){
		$sql="select *from user_table where /*firstname='".$_POST['firstname']."' And lastname='".$_POST['lastname']."'
		And */ meter_no='".$_POST['meter_no']."'limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1){
		echo '<div id="msg">Try another meter!</div>';
		}
		else{
		$sql="insert into user_table values('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."',
		'".$_POST["contact_no"]."','".$_POST["meter_type"]."','".$_POST["meter_no"]."')";
		mysqli_query($conn,$sql);
		echo '<div id="msg"> New user included!</div>';
		}
	}
		
?>


	<p ><u><h1 style="text-align:center; font-size:60px">New user form</h1></u></p>
	<div class="button"><button id="button" type="button" onclick="location.href='Home page.php?name=<?php echo $name;?>'">Home</button></div>
	<div class="relative">
	<form method="post">
	
		First name:<br>
		<input type="text" name="firstname" value=""><br>
		Last name:<br>
		<input type="text" name="lastname" value=""><br><br>
		Email:<br>
		<input type="text" name="email" value=""><br><br>
		Contact No:<br>
		<input type="tel" name="contact_no" min="1" max="11"><br><br>
		<input type="radio" name="meter_type" value="prepaid" checked> Prepaid<br>
		<input type="radio" name="meter_type" value="postpaid"> Postpaid<br><br>
		Meter No:<br>
		<input type="text" name="meter_no" value=""><br><br>
		<input type="submit" name="post" value="Submit" id="a1"> <input type="reset" value="reset" id="a1">
		
	</form>
</div>

</body>

</html>