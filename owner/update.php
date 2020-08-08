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
<?php

 include('../database.php');

 if(isset($_POST['done'])){

 $id = $_GET['id'];
 $name = $_POST['name'];
 $price = $_POST['price'];
 
 $q="UPDATE `data` SET id=$id, `Name`='$name',`prize`='$price' WHERE `id`='$id'";
;

 $query = mysqli_query($con,$q);

 header('location:display.php');
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


</style>

</head>
<body>
<div class=bg>
<?php
include('../navo.html');
?>


<!----------------------welcome section------------------------------>
<?php
 
if(isset($_SESSION['sname']))
{
 ?>
   <br>
   <strong><div class=" welcome text-center text-dark" style="font-size: 20px"><?php echo "Welcome ". $_SESSION['sname']; ?></div></strong>
 <?php
}
else
	{
	  echo "<h1>You are not login</h1>";

	 }
?>
<!----------------------end------------------------------>


 <div class="col-lg-6 m-auto">
 
 <form method="POST">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>

 <label> Name: </label>
 <input type="text" name="name" class="form-control"> <br>

 <label> Price: </label>
 <input type="number" name="price" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 <a href="display.php" class="previous text-center" style="font-size: 15px" >&laquo; Go To Previous Page</a>

 </div>
 </form>
 </div>

</div>
</body>
</html>