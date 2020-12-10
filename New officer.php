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
	<title>New officer</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
	div {position:absolute;
		padding:10px;
		font-size:30px;
		left:750px;
		top:200px;
		<--border:2px solid black;-->
		align:center;}
	div.button,#button{position:relative;left:80px;top:-50px;font-size:30px;padding:5px;}
	#a1	{font-size:30px;
	padding:5px;}
	#a3  {position:absolute;left:1420px;top:50px;font-size:40px;}
#msg{position:absolute;left:170px;top:120px;font-size:30px;color:rgb(225,225,225);background-color:rgba(44, 62, 80,0.7);padding:20px;}
	</style>
</head>
<body>
<?php
	
	
	
	if(isset($_POST['post'])){
		if(!$_POST['password']=="" and !$_POST['name']=="" ){
		$sql="select *from officer_info where /*name='".$_POST['name']."' And*/ password='".$_POST['password']."'limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1){
			echo '<div id="msg">Try another password!</div>';
		}
		else{
		$sql="insert into officer_info values('".$_POST['name']."','".$_POST['password']."')";
		mysqli_query($conn,$sql);
		echo '<div id="msg">New user included!</div>';
		}
	}
	else{
		
		echo '<div id="msg">Enter Name and Password!</div>';
	}
	}
	
	else{
		echo '<div id="msg">Enter Name and Password!</div>';
	}
	
	
?>


	<p ><u><h1 style="text-align:center; font-size:60px">New officer form</h1></u></p>
	<div class="button"><button id="button" type="button" onclick="location.href='Index page.php'">Official login form</button></div>
	<div class="relative">
	<form method="post">
	
		Name: <br>
		<input type="text" name="name" ><br>
		Password:<br>
		<input type="password" name="password" ><br><br>
		<input type="submit" name="post" value="Sign up" id="a1"></input> <input type="reset" value="reset" id="a1">
		
	</form>
</div>

</body>

</html>