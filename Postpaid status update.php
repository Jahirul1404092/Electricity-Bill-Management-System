<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="electricity_bill_managment_system";
	$conn=mysqli_connect($host,$user,$password,$db);
	if(!$conn){
		die("connection failed: " .mysqli_connect_error());
		mysqli_ping($conn);
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
	<title>Postpaid status update</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
	div  {position:absolute;left:220px;top:120px;font-size:40px;}
	div.status  {position:absolute;left:720px;top:460px;font-size:40px;}
	div.button,#button{position:absolute;left:80px;top:20px;font-size:30px;padding:5px;}
	ul {font-size:35px;}
	#sts {font-size:20px;}
	#a1  {position:absolute;left:200px;top:190px;}
	#a2  {font-size:30px; padding:5px;}
	#a3  {position:absolute;left:1420px;top:50px;font-size:40px;}
	div.buttonPostpaiddatapage,#buttonPostpaiddatapage{position:relative;left:130px;top:-56px;font-size:30px;padding:5px;}
	#msg{position:absolute;left:1300px;top:200px;font-size:30px;color:rgb(225,225,225);background-color:rgba(44, 62, 80,0.7);padding:20px;}
	</style>
</head>
<body>
<?php
	$meter_no=$_GET['meter_no'];
	$name=$_GET['name'];
	//echo $meter_no;
	if(isset($_POST['post'])){
		$sql="select *from data where meter_no='".$meter_no."' And status!='null'limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1){
			$sql="update data set status='".$_POST['status']."' where meter_no='".$meter_no."' "; 
			mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)>=1){
				echo '<div id="msg">Status updated!</div>';
				//header("Location:Postpaid data page.php?$meter_no&amp;$name");
			}
		}
	}
?>
<div id="a3"> Name :  <?php echo $name;?><br></div>

<p ><u><h1 style="text-align:center; font-size:60px">Postpaid Status Update</h1></u></p>
<div class="button"><button id="button" type="button" onclick="location.href='Home page.php?name=<?php echo $name;?>'">Home</button></div>
<div class="buttonPostpaiddatapage"><button id="buttonPostpaiddatapage" type="button" onclick="location.href='Postpaid data page.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>'">Postpaid data page</button></div>
<div>
 <?php
  $sql=" select *from user_table where meter_no='".$meter_no."' ";
  $result=mysqli_query($conn,$sql);
   if($result){
	 while($row=$result->fetch_assoc()){
	echo "<ul>";
	echo "<li>Name:   ".$row['firstname']." ".$row['lastname']."</li>";
	echo "<li>Meter type:   Postpaid</li>";
	echo "<li>Meter no.:   ".$row['meter_no']."</li>";
	echo "<li>Contact no.:".$row['contact_no']."</li>";
	echo "<li>E-mail:    ".$row['email']."</li>";
	echo "</ul>";
	 }
   }
?>
</div>

<div class="status">
<form method="post" action="">
	Status:<br>
	
		<input id="sts" type="radio" name="status"  value="Online" checked> Online<br>
		<input id="sts" type="radio" name="status"  value="Offline"> Offline<br>
		<input id="sts" type="radio" name="status"  value="Should be cut!"> Should be cut!<br><br>
	
	<div id="a1"><input type="submit" name="post" value="submit" id="a2" ></div>
</form>
</div>



</body>

</html>