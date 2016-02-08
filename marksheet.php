
<?php
	$contestID=$_GET['contestID'];
	$problemID=$_GET['problemID'];
	$userID=$_GET['user'];
	$sql="SELECT * FROM submitTable WHERE problemTemp='$problemID' AND userID='$userID'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			echo$problemID.'.';
			echo'<img src="';echo$row['problemName'].'"width="100%" class="img-thumbnail">';
			
		}
		
	}
		
?>
<form class="form-horizontal" method="POST">
	<input type="number" class="form-control" name="mark"placeholder="Given Marks" required="required">
	 <button class="btn btn-info btn-block login" type="submit" name="submit">Submit</button>
</form>
	<?php
		$sql="CREATE TABLE IF NOT EXISTS scoreBoard(
			scoreID int(20) NOT NULL AUTO_INCREMENT,
			contestID int(20),
			problemID VARCHAR(100),
			userID VARCHAR(100),
			mark INT(100),
			PRIMARY KEY(scoreID)
		)";
		 if(!mysqli_query($conn,$sql)){
			echo'There was a problem';
		}
		 if(isset($_POST['submit'])){
			$mark=$_POST['mark'];
			$sql="SELECT * FROM scoreBoard WHERE contestID='$contestID' AND problemID='$problemID' AND userID='$userID'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				$sql="UPDATE scoreBoard
						SET mark='$mark'
						WHERE contestID='$contestID' AND problemID='$problemID' AND userID='$userID'";
				if(mysqli_query($conn,$sql)){
					echo'<div class="alert alert-success">
						  <strong>Marks !</strong> Updated.
						</div>';
				}
			}else{
				$sql="INSERT INTO scoreBoard(contestID,problemID,userID,mark)
			VALUES('$contestID','$problemID','$userID','$mark')";
			if(mysqli_query($conn,$sql)){
				echo'<div class="alert alert-success">
						  <strong>Marks !</strong> Added.
						</div>';
			}else
				echo'There was an Problem'.mysqli_error($conn);
			}
			
		}
	 ?>