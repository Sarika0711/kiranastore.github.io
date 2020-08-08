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


<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-MR" xml:lang="en-MR"> 
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<style>
 .welcome{
 	font-size: 20px;
 }
</style>


</head>
<body>


 <?php
 include('../navo.html');
if(isset($_SESSION['sname']))
{
 ?>
 <br>
<strong><div class=" welcome text-center"><?php echo "Welcome ". $_SESSION['sname'];?></div></strong>
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
 <h2 class="text-warning text-center" > Display Table Data </h2>
 <br>

 <form action="display.php" method= "POST">
<table>
<tr>



<th>enter product name</th>
<td><input type="text" name="name" placeholder="enter name" required></td>

<td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</form>


 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> Name </th>
 <th> Price </th>
 <th> Image </th>
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php

 include('../database.php');
 $names=$_POST['name']; 
 $q = "SELECT * FROM `data` WHERE `Name` LIKE '%$names%'";

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
 			<td> <?php echo $res['prize'];  ?> </td>
 			<td> <image src="../dataimg/<?php echo $res['image']; ?>" style="max-width:50px;"> </td>
 			<td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
 			<td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td>

 </tr>

 <?php 
 }
  ?>

 </table> 
 <?php
 }

 ?>