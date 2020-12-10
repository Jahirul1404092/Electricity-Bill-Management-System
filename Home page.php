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
	<title>Home page</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
ul {
    list-style-type: none;
    margin: 20px;
    padding: 200;
    overflow: hidden;
    background-color: rgba(44, 62, 80,0.8);
	font-size:25px;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 20px 130px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: rgba(60, 62, 80,0.6);
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 13px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
#a3  {position:relative;left:1420px;top:50px;font-size:40px;}
div.button,#button{position:relative;left:80px;top:20px;font-size:30px;padding:5px;}
	</style>
	
</head>
<body>

<?php 
	$name=$_GET['name'];
?>
<div id="a3"> Name :  <?php echo $name;?><br></div>
<div class="button"><button id="button" type="button" onclick="location.href='Index page.php'">Log out</button></div>

<p ><u><h1 style="text-align:center; font-size:60px">Official Home Page</h1></u></p>

<ul>
  <li><a href="Home page.php?name=<?php echo $name;?>">Home</a></li>
  
  <li class="dropdown"><a >Prepaid</a>
    <div class="dropdown-content">
      
<?php

	///$uname=$_GET['name'];
	///echo $uname;
	$sql="select meter_no from user_table where meter_type='prepaid'";
	$result=mysqli_query($conn,$sql);
	$i=0;
	if($result){
		$prepaid=array();
		while($row=$result->fetch_assoc()){
			//$prepaid[]=$row["meter_no"];
			//header("location:Prepaid data page.php?meter_no=$row["meter_no"]");
			//echo "id: ".$row["meter_no"]."<br>";
			//echo "$prepaid[$i]. <br>";
			//$string="".$row["meter_no"];
			echo '<a href="Prepaid data page.php?meter_no='.$row['meter_no'].'&amp;name='.$name.' ">'.$row["meter_no"];
			//$i++;
			
		}
		//$fieldinfo=mysqli_fetch_field($result);
		//foreach($fieldinfo as $val){
		//	echo $val;
		//}
	}
?>
	  
      
      <a></a>
    </div>
  </li>
  
  <li class="dropdown"><a >Postpaid</a>
    <div class="dropdown-content">
      <?php

	///$uname=$_GET['name'];
	///echo $uname;
	$sql="select meter_no from user_table where meter_type='postpaid'";
	$result=mysqli_query($conn,$sql);
	$i=0;
	if($result){
		$prepaid=array();
		while($row=$result->fetch_assoc()){
			//$prepaid[]=$row["meter_no"];
			//header("location:Postpaid data page.php?meter_no=$row["meter_no"]");
			//echo "id: ".$row["meter_no"]."<br>";
			//echo "$prepaid[$i]. <br>";
			//$string="".$row["meter_no"];
			echo '<a href="Postpaid data page.php?meter_no='.$row['meter_no'].'&amp;name='.$name.' ">'.$row["meter_no"];
			//$i++;
			
		}
		//$fieldinfo=mysqli_fetch_field($result);
		//foreach($fieldinfo as $val){
		//	echo $val;
		//}
	}
?>
      <a></a>
    </div>
  </li>
  
  <li class="dropdown"><a >Applied List</a>
    <div class="dropdown-content">
<?php

	///$uname=$_GET['name'];
	///echo $uname;
	$sql="select meter_no from user_table where meter_type='applied'";
	$result=mysqli_query($conn,$sql);
	$i=0;
	if($result){
		$prepaid=array();
		while($row=$result->fetch_assoc()){
			//$prepaid[]=$row["meter_no"];
			//header("location:Prepaid data page.php?meter_no=$row["meter_no"]");
			//echo "id: ".$row["meter_no"]."<br>";
			//echo "$prepaid[$i]. <br>";
			//$string="".$row["meter_no"];
			echo '<a href="Prepaid data page.php?meter_no='.$row['meter_no'].'&amp;name='.$name.' ">'.$row['meter_no'];
			//$i++;
			
		}
		//$fieldinfo=mysqli_fetch_field($result);
		//foreach($fieldinfo as $val){
		//	echo $val;
		//}
	}
?>
      
    </div>
  </li>
 
  <li class="dropdown"><a href="New user form.php?name=<?php echo $name;?>">New User</a>
  </li>
</ul>

<h3></h3>








</body>

</html>