<?php
include('mysql_connect.php');
	$id=($_GET['id']);
	$sql="DELETE FROM problemSet WHERE problemID='$id'";
	if(!mysqli_query($conn,$sql)){
		echo'There was a problem'.mysqli_query($conn);
		header('location:admin_home.php');
	}
	else{
		echo'Item Deleted';
		header('location:admin_home.php');
	}
		
?>