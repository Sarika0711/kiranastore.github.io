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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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


<div style="margin-top: 90px"class="align-center">
<a href="vc/login1.php"><button type="button" class="btn btn-primary">Manik Kirana Store</button></a>
<a href="vc/login2.php"><button type="button" class="btn btn-primary">Raju Dada Store</button></a>
<a href="vc/login3.php"><button type="button" class="btn btn-primary">Bhagat Kirana Store</button></a>
</div>
