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
		$_SESSION["log_state"]=0;
		
if(isset($_POST['username'])){
	if(isset($_POST['password'] )){
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$sql="select *from officer_info where username='".$uname."' AND password='".$pass."'limit 1";
	$result=mysqli_query($conn,$sql);
	//$i=1;
	if(mysqli_num_rows($result)==1 ){
		//echo "You have Successfully logged in";
		//echo "";
		//session_start();
		$_SESSION["log_state"]=1;
	    header("Location:Home page.php?name=$uname") ;
	}
	else {
		echo '<div id="msg">You have entered Incorrect password or name!!</div>';
	}
	}
	}
	else{
		echo '<div id="msg">Enter Name and Password!!</div>';
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page</title>
	
	<style>
	
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
	h1	{padding:0px;text-align:center; color:; font-size:"100px";}
	div{ padding:150px;text-align:center;background-color:#ffffff;background-width:"30px";}
	.container{
	width: 300px;
	height: 350px;
	text-align: 0px 20px;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 150px;
}
#msg{position:absolute;left:660px;top:40px;font-size:30px;color:rgb(225,225,225);background-color:rgba(44, 62, 80,0.7);padding:20px;}
	</style>
</head>
<body >
<div class="container" >
<form method="post" action="#">
	<h1><u>Official Login form</u></h1>
	<h2>  User Name:</h2><input type="text" name="username" align="center"padding="20px" placeholder="username"></input>
	
	<h2>   password:</h2><input type="password" name="password" align="center""padding="20px" placeholder="Password"></input>
	<p><p><button type="submit""padding="10px" onclick="location.href='Home page.php'"><h2>submit</h2></button><p></p>
	<p><p><button style="padding:10px;font-size:20px;" type="button" onclick="location.href='New officer.php' "> New Officer?</button>  <p></p>  
	<!--<p><p><button "padding="10px" onclick="location.href=' '"><h2>New officer</h2></button><p></p>-->
</form>
</div>



</body>

</html>