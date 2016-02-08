<?php
	$id=($_GET['id']);
	$sql="DELETE FROM contestTable WHERE contestID='$id'";
	if(!mysqli_query($conn,$sql)){
		echo'There was a problem'.mysqli_query($conn);
	}
	else{
		echo'Item Deleted';
		header('location:admin_home.php');
	}
		
?>