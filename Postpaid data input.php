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
	<title>Postpaid data input page</title>
	<style>
	body  {background-image:url("ocean.jpg");background-size:1930px auto;background-repeat: no-repeat;}
	div  {position:absolute;left:515px;top:200px;font-size:34px;}
	div.button,#button{position:absolute;left:80px;top:20px;font-size:30px;padding:5px;}
	#a1  {position:absolute;left:200px;top:500px;}
	#a6  {position:absolute;left:400px;top:500px;}
	div.status  {position:absolute;left:1050px;top:700px;font-size:30px;}
	#a2  {font-size:40px; padding:5px;}
	#a3  {position:absolute;left:1350px;top:160px;font-size:40px;}
	#a4  {position:absolute;left:1420px;top:50px;font-size:40px;}
	#a5  {position:absolute;left:1480px;top:30px;font-size:40px;}
	div.buttonPostpaiddatapage,#buttonPostpaiddatapage{position:relative;left:130px;top:-56px;font-size:30px;padding:5px;}
	#msg{position:absolute;left:170px;top:120px;font-size:30px;color:rgb(225,225,225);background-color:rgba(44, 62, 80,0.7);padding:20px;}
	
	</style>
</head>
<body>

<?php
	$meter_no=$_GET['meter_no'];
	$name=$_GET['name'];
	//echo $meter_no;
	if(isset($_POST['post'])){
		$sql="select *from data where meter_no='".$meter_no."' And month='".$_POST['month']."'limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1){
			if(!$_POST['month']=="" and !$_POST['used_unit']=="" and !$_POST['bill']=="" and !$_POST['last_date']=="" and !$_POST['bill_with_fine']=="" and !$_POST['due_date']=="" ){
			$sql="update data set used_unit='".$_POST['used_unit']."',bill='".$_POST['bill']."', 
			last_date='".$_POST['last_date']."',bill_with_fine='".$_POST['bill_with_fine']."',
			due_date='".$_POST['due_date']."',status='Online' where meter_no='".$meter_no."' and month='".$_POST['month']."' "; 
			mysqli_query($conn,$sql);
			//$result=mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)==1){ /// ei line e problem ache
			echo '<div id="msg">data updated!</div>';
			}
			else if(mysqli_affected_rows($conn)==0){ /// ei line e problem ache
			echo '<div id="msg">Data is not updated!</div>';
			}
			
		}
		else {
			echo '<div id="msg">Form is empty!</div>';
		}
		}
		else
		{
			/*$sql="select *from data where meter_no='".$meter_no."'limit 1";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				$sql="insert into data(meter_no,month,used_unit,bill,last_date,bill_with_fine,due_date,status) 
			values('".$meter_no."','".$_POST['month']."','".$_POST['used_unit']."','".$_POST['bill']."',
			'".$_POST['last_date']."','".$_POST['bill_with_fine']."','".$_POST['due_date']."','Online')where meter_no='".$meter_no."' ";
			mysqli_query($conn,$sql);
			if(mysqli_affected_rows($conn)==1){
				echo '<div id="msg">Data recorded!</div>';
			}
				
			}
			else{
			*/
			
			$sql="insert into data(meter_no,month,used_unit,bill,last_date,bill_with_fine,due_date,status) 
			values('".$meter_no."','".$_POST['month']."','".$_POST['used_unit']."','".$_POST['bill']."',
			'".$_POST['last_date']."','".$_POST['bill_with_fine']."','".$_POST['due_date']."','Online') ";
			mysqli_query($conn,$sql);
		if(mysqli_affected_rows($conn)==1){
			echo '<div id="msg">Data recorded!</div>';
		}
			}	
		//}
		
	}


?>
<div id="a5"> Name : <?php echo $name;?><br></div>
<p ><u><h1 style="text-align:center; font-size:60px">Postpaid data Input Page</h1></u></p>
<div class="button"><button id="button" type="button" onclick="location.href='Home page.php?name=<?php echo $name;?>'">Home</button></div>
<div class="buttonPostpaiddatapage"><button id="buttonPostpaiddatapage" type="button" onclick="location.href='Postpaid data page.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>'">Postpaid data page</button></div>
<div class="status"><button style="padding:10px;font-size:30px;" type="button" onclick="location.href='Postpaid status update.php?meter_no=<?php echo $meter_no;?>&amp;name=<?php echo $name;?>' "> Status Update</button></div> 
<div id="a3"> Meter No.: <?php echo $meter_no;?><br>
	  Meter Type:Postpaid
</div>
<div>
<form method="post">
	Month:
	<input type="text" name="month" size="40px"><br><br>
	Used Unit:
	<input type="text" name="used_unit" size="33px"><br><br>
	Bill:
	<input type="text" name="bill" size="46px"><br><br>
	Last Date:
	<input type="date" name="last_date" size="40px"><br><br>
	Bill with Fine:
	<input type="text" name="bill_with_fine" size="26px"><br><br>
	Due Date:
	<input type="date" name="due_date" size="48px"><br><br>
	<div id="a1"><input type="submit" name="post" value="submit" id="a2" ></div>
	<div id="a6"><input type="reset" value="reset" id="a2"></div>
</form>
</div>


</body>

</html>