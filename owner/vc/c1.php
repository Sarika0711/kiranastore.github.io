<?php
session_start();
if($_SESSION['uid'])
{
	//echo $_SESSION['uid'];
}
else
{
	header('location:../owlogin.php');
}
?>


<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>


 <?php
 include('../../navo.html');
if(isset($_SESSION['sname']))
{
 ?>
   <br>
   <strong><div class=" welcome text-center"><?php echo "Welcome ". $_SESSION['sname']; ?></div></strong>
 <?php
}
else
	{
	  echo "<h1>You are not login</h1>";

	 }
?>



 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h2 class="text-warning text-center"> Display Customers </h2>
 <br>

<form action="custemer.php" method= "POST">
<table>
<tr>
<th>Enter Customer Name</th>
<td><input type="text" name="name" placeholder="enter name" required></td>

<td><input type="submit" name="submit" value="Submit"></td>


</tr>
</table>
</form>
<br>

 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> No </th>
 <th> Name </th>
 <th> Total in RS</th>
 <th> Date </th>
 
 </tr >

 <?php

 include('../../database.php');
 $names=$_POST['name']; 
 $q = "SELECT * FROM `seldata`  WHERE `Name` LIKE '%$names%'";

 $query = mysqli_query($con,$q);
 if(mysqli_num_rows($query)<1)
	{
		echo "<tr><td colspan='5'>record not found</td></tr>";
	}
	else
	{ 
$count=0;
		while($res=mysqli_fetch_assoc($query))
		{
			$count++;
			
			 ?>
			<tr>
				<tr class="text-center">
			<td><?php echo $count; ?></td>
			<td> <?php echo $res['Name'];  ?> </td>
 			<td> <?php echo $res['Total'];  ?>rs </td>
 			<td> <?php echo $res['Date'];  ?> </td>
 			

 </tr>

 <?php 
 }
  ?>

 </table> 
 <?php
 }

 ?>