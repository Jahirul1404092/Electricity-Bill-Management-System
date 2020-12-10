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
	<title>Prepaid data page</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1920px auto;background-repeat: no-repeat;font-size:30px; margin:30px; }
	table,td,th  {border: 2px solid black;padding:6px; font-size:20px;}
	table  {border-collapse:collapse;width:95%;}
	div.button  {position:absolute;left:1550px;top:150px;}
	div.buttonH,#buttonH{position:absolute;left:80px;top:20px;font-size:30px;padding:5px;}
	button:hover  {background-color:black;color:white;}
	#a3  {position:absolute;left:1420px;top:50px;font-size:40px;}
	</style>
</head>
<body>
<?php 
	$name=$_GET['name'];
	//echo $name;
	$meter_no=$_GET['meter_no'];
	///echo $meter_no;
?>
<div id="a3"> Name :  <?php echo $name;?><br></div>
<p ><u><h1 style="text-align:center; font-size:60px">Prepaid data page</h1></u></p>
<div class="buttonH"><button id="buttonH" type="button" onclick="location.href='Home page.php?name=<?php echo $name;?>'">Home</button></div>

<div>
<div class="button"><button style="padding:20px; font-size:20px;" type="button" 
					onclick="location.href='Prepaid data input.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>'"> <b>Data Input</b></button></div>
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
	echo "<li>Status: Online</li>";
	echo "</ul>";
	 }
   }
   ?>
<!--<ul>
	<li>Name: firstname+lastname</li>
	<li>Meter type: Prepaid</li>
	<li>Meter no.:  <?php echo $meter_no;?></li>
	<li>Contact no.:</li>
	<li>E-mail:</li>
	<li>Status:</>
</ul>-->
 <?php
 
 $sql=" select *from data where meter_no='".$meter_no."' ";
 $result=mysqli_query($conn,$sql);
  echo " <table margin='22px' <!--border='1'-->
  <tr>
  <th>Month</th>
  <th>Used Unit</th>
  <th>Bill</th>
  <th>Status</th>
  </tr> " ;
 if($result){
	 while($row=$result->fetch_assoc()){
	echo "<tr>";
	echo "<td>" .$row['month']. "</td>";
	echo "<td>" .$row['used_unit']. "</td>";
	echo "<td>" .$row['bill']. "</td>";
	echo "<td>" .$row['status']. "</td>";
	echo "</tr>";
 }
 }
 ?>
<!--
</div>
<table>
  <tr>
  <th>Month</th>
  <th>Used Unit</th>
  <th>Total Cost</th>
  </tr>
  <tr>
  <td>January</td>
  <td></td>
  <td></td>
  </tr>
  <td>Febuary</td>
  <td></td>
  <td></td>
  </tr>
  <td>March</td>
  <td></td>
  <td></td>
  </tr>
  <td>April</td>
  <td></td>
  <td></td>
  </tr>
  <td>May</td>
  <td></td>
  <td></td>
  </tr>
  <td>June</td>
  <td></td>
  <td></td>
  </tr>
  <td>July</td>
  <td></td>
  <td></td>
  </tr>
  <td>Augast</td>
  <td></td>
  <td></td>
  </tr>
  <td>September</td>
  <td></td>
  <td></td>
  </tr>
  <td>October</td>
  <td></td>
  <td></td>
  </tr>
  <td>November</td>
  <td></td>
  <td></td>
  </tr>
  <td>December</td>
  <td></td>
  <td></td>
  </tr>
  
</table>
-->
</body>

</html>