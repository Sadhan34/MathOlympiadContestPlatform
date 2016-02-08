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
    <h4 class="title_style">You are going to Add Judge for <?php echo$contest;?></h4>
    <form class="form-horizontal" method="POST">

        <div class="form-group">
            <label class="col-sm-4 control-label">Judge's Username</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="username" name="judge_username" placeholder="User Name"required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Judge's Password</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="judge_password" placeholder="Password" required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-7">
                <button type="submit" class="btn btn-default" name="submit">Add Judge</button>
            </div>
        </div>
    </form>
</div>

<?php
$notice=NULL;
    include('mysql_connect.php');
    $sql="CREATE TABLE IF NOT EXISTS judgeTable(
      Jid int(11) NOT NULL AUTO_INCREMENT,
      JudgeName VARCHAR(100) NOT NULL,
      Password VARCHAR(50),
      contestID INT(20),
      PRIMARY KEY(Jid)

    )";
    if(mysqli_query($conn,$sql)){
        //echo("Table create successfully");
    }
    //Insert Data
    if(isset($_POST['submit'])){
        $jName=$_POST['judge_username'];
        $pass=$_POST['judge_password'];
		$sql="SELECT * FROM judgeTable WHERE JudgeName='$jName' AND contestID='$contestID'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			echo'<div class="alert alert-danger">
						  <strong>Judge Alresy Exist
						</div>';
		}else{
			$sql="INSERT INTO judgeTable(JudgeName,Password,contestID)
            VALUES('$jName','$pass','$contestID')";
            if(mysqli_query($conn,$sql)){
            echo'<div class="alert alert-success">
						  <strong>Judge!</strong> Added.
						</div>';

			}else
				echo'<div class="alert alert-danger">
						  <strong>Try Again! </strong>'.mysqli_error($conn).
						'</div>';
		}
	}
    mysqli_close($conn);
?>