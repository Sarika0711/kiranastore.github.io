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


<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("../img/addother1.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.card{

	background: linear-gradient(
	rgba(0,0,0,0.7),
	rgba(0,0,0,0.7)
	);

}
</style>


</head>
<body>
 <div class="bg">


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


 <div class="col-lg-6 m-auto">
 
 <form method="POST" enctype="multipart/form-data">
 
 <br><br>
 <div class="card">
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">Add Item</h1>
 </div><br>

 <label><strong class="text-white">Name :</strong> </label>
 <input type="text" name="name" class="form-control"  placeholder="eneter item name"  required> <br>

 <label> <strong class="text-white">  Price :</strong> </label>
 <input type="number" name="price" class="form-control" placeholder="eneter price " required> <br>

 <label><strong class="text-white">  Img : </strong></label>
 <input type="file" name="img" class="form-control" required> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 </div>
 </form>
 </div>
</div>
</body>
</html>

<?php	
if(isset($_POST['submit']))
{
	include('../database.php');
	
	
	$name=$_POST['name'];
	$price=$_POST['price'];
	
	$imagename =$_FILES['img']['name'];
	$tempimg =$_FILES['img']['tmp_name'];
	move_uploaded_file($tempimg,"../dataimg/$imagename");

	$query="INSERT INTO `data`( `Name`, `prize`, `image`) VALUES ('$name','$price','$imagename')";

	
	$run=mysqli_query($con,$query);
	if($run == TRUE)
	{
		?>
		<script>
		alert('data inserted succesfully');
		</script>
	<?php
	}
}

?>