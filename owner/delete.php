<?php


	include('../dbcon.php');
	
	$id=$_REQUEST['sid'];
	$sql="DELETE FROM `student` WHERE `id`='$id'";
	$run=mysqli_query($con,$sql);
	if($run == TRUE)
	{
		?>
		<script>
		alert('data deleted succesfully');
		window.open('deleteform.php','_self');
		</script>
	<?php
	}


?>