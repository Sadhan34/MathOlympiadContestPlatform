<?php
$user=$_SESSION['username'];
$sql="SELECT * FROM submitTable WHERE userID='$user'";
$result=mysqli_query($conn,$sql);
echo'<div class="pad-bot col-sm-8 col-sm-offset-2">
			<h5><strong>My Submission</strong></h5></div>';
if(mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)){
       echo'<div class="col-sm-8 col-sm-offset-2"><div class="my_contest1">
                '.$row['problemTemp']/*.'
                <img class="img-thumbnail img-responsive" src="';echo$row['problemName'].'"alt="" height="400" width="100%">
				
				</br><a href="contestant_home.php"><button class="btn btn-info btn-block login" type="submit" name="submit">Upload Again</button></a>*/
			.'</div></div>
			';
    }
}
else
    echo'No items. ';
?>
