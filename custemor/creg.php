<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("../img/reshu.jpg");
}

* {
 
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: black;
  opacity: 0.8;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=tel]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=tel]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>



</head>
<body>
<br><br><br>
<form action=" " method="POST">
  <div class="container">
    <h1 class="text-white"><center><strong>customer Register</strong></center></h1>
    <p class="text-white">Please fill in this form to create an account.</p>
    <hr>

    <label for="name"class="text-white"><b>customer name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" >
   <span id="customername" class="text-danger"></span>

    
  <label for="phoneNumber" class="text-white">Phone Number:Ptteren(xxx-xxx-xxxx) <span class="warning"></label>
  <input  type="text" name="contact" class="phoneNumber_inputControl" id="phoneNumber"  placeholder="XXX-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>


    <label for="psw" class="text-white"><b>address</b></label>
    <input type="text" placeholder="Enter addrees" name="address" id="address" required>



    <label for="psw" class="text-white"><b> Password</b></label>
    <input type="password" placeholder=" Password" name="pass"  id="paw"required>
     
    
    <label for="psw" class="text-white"><b>Confirm Password</b></label>
    <input type="password" placeholder=" Password" name="pass" id="txtConfirmPassword" required>
    
    <hr>

    <p class="text-white" required>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn text-white" name="submit">
        <a href="#">Register</a>
    </button>
  </div>
  
  <div class="container signin">
    <p class="text-dark">Already have an account? <a href="clogin.php" class="text-dark">Sign in</a>.</p>
  </div>
       

</form>
</body>
</html>

<?php

include('../database.php');

if(isset($_POST['submit']))
{
$cname= $_POST['name'];
$pcontact= $_POST['contact'];
$address= $_POST['address'];
$pass= $_POST['pass'];


$query="INSERT INTO `ctable`(`Name`, `pcont`, `address`, `password`) VALUES ('$cname', '$pcontact' , '$address' , '$pass')";
$run=mysqli_query($con,$query);
//$data= mysqli_fetch_assoc($run);


if($run==TRUE)
{
      //echo "data inserted successfully";
      //header('location:login.php');
  ?>
      <script>
        alert('Registration succesfully');
        window.open('selectdata.php');
       </script>
   <?php  
  
}
else
    {
      echo "data  not inserted successfully";
    }

}
?>

