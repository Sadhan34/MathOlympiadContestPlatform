<?php
	$id=($_GET['id']);
	$sql="SELECT * FROM contestTable WHERE contestID='$id'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) >0){
			$row=mysqli_fetch_assoc($result);
			
			$contest=$row['contestName'];
			$contestID=$row['contestID'];
		}
?>
<div class="colorDiv">

       <h4 class="title_style">You are going to Add Contestant for <?php echo$contest;?></h4>
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-sm-4 control-label">Contestant's Full Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Contestant's Username</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Contestants Password</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="password" placeholder="Password"required="required">
            </div>
        </div>
        <!--<div class="form-group">
            <label class="col-sm-4 control-label">Upload File/Contestant Details</label>
            <div class="col-sm-7">
                <input type="FILE" class="form-control" name="file" placeholder="Password">
            </div>
        </div>-->
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-7">
                <button type="submit" class="btn btn-default" name="submit">Add User</button>
            </div>
        </div>
    </form>

</div>

<?php
include('mysql_connect.php');

$sql="CREATE TABLE IF NOT EXISTS addContestant(
          contestantID int(11) NOT NULL auto_increment,
          FullName VARCHAR (100),
          LogId VARCHAR (70),
          PassCode VARCHAR (50),
          contestID VARCHAR (20),
		PRIMARY KEY (contestantID)
        )";
if(mysqli_query($conn, $sql)){
    //echo("<br>"."Table created Succesfully");
}
else
     echo'<div class="alert alert-danger">
						  <strong>Try Again! </strong> There was a Problem.
						</div>'.mysqli_error($conn);

if(isset($_POST['submit'])){
    $fname=$_POST['fullname'];
    $name=$_POST['username'];
    $pass=$_POST['password'];
	$sql="SELECT * FROM addContestant WHERE LogID='$name' AND contestID='$id'";
    $result=mysqli_query($conn,$sql);
	 if(mysqli_num_rows($result) > 0){
		echo'<div class="alert alert-danger">
						  <strong>Contestant Already Exist !</strong></div>';
	 }else{
		 $sql="INSERT INTO addContestant(FullName,LogId,PassCode,contestID)
              VALUES ('$fname','$name','$pass','$contestID') ";
			  if(mysqli_query($conn,$sql)){
            echo'<div class="alert alert-success">
						  <strong>Contestant!</strong> Added.
						</div>';

        }
        else
            echo'<div class="alert alert-danger">
						  <strong>Try Again! </strong>'.mysqli_error($conn).
						'</div>';
	 }
}
mysqli_close($conn);

?>
