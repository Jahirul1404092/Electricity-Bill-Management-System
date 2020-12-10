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
	<title>Postpaid data page</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
		table,td,th  {border: 2px solid black;padding:6px; font-size:20px;}
	table  {border-collapse:collapse;width:95%;}
	div.status  {position:absolute;left:1550px;top:115px;font-size:20px;}
	div.button  {position:absolute;left:1550px;top:195px;font-size:20px;}
	div.buttonH,#buttonH{position:absolute;left:80px;top:20px;font-size:30px;padding:5px;}
	button:hover  {background-color:black;color:white;font-size:20px;}
	#a3  {position:absolute;left:1420px;top:50px;font-size:40px;}
	ul {font-size:30px;}
	</style>
	</style>
</head>
<body>
<?php 
	$meter_no=$_GET['meter_no'];
	$name=$_GET['name'];
	//echo $meter_no;
?>
<div id="a3"> Name :  <?php echo $name;?><br></div>
<p ><u><h1 style="text-align:center; font-size:60px">Postpaid data page</h1></u></p>
<div class="buttonH"><button id="buttonH" type="button" onclick="location.href='Home page.php?name=<?php echo $name;?>'">Home</button></div>
<div style="margin:25px">
<div class="status"><button style="padding:20px;font-size:20px;" type="button" onclick="location.href='Postpaid status update.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>' "> Status Update</button></div>                                    
<div class="button"><button style="padding:20px;font-size:20px; width:170px;"type="button" onclick="location.href='Postpaid data input.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>'"> Data Input</button></div>
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
 
 $sql=" select *from data where meter_no='".$meter_no."' ";
 $result=mysqli_query($conn,$sql);
  echo " <table margin='22px' <!--border='1'-->
  <tr>
  <th>Month</th>
  <th>Used Unit</th>
  <th>Bill</th>
  <th>Last Date</th>
  <th>Bill with Fine</th>
  <th>Due Date</th>
  <th>Status</th>
  </tr> " ;
 if($result){
	 while($row=$result->fetch_assoc()){
	echo "<tr>";
	echo "<td>" .$row['month']. "</td>";
	echo "<td>" .$row['used_unit']. "</td>";
	echo "<td>" .$row['bill']. "</td>";
	echo "<td>" .$row['last_date']. "</td>";
	echo "<td>" .$row['bill_with_fine']. "</td>";
	echo "<td>" .$row['due_date']. "</td>";
	echo "<td>" .$row['status']. "</td>";
	echo "</tr>";
 }
 }
 ?>
 


</body>

</html>