<?php
	$numOfcontest=$_GET['numOfcontest'];//echo$numOfcontest;
	
	$user=$_SESSION['username'];//echo$user;
	   $sql="CREATE TABLE IF NOT EXISTS submitTable(
          submitID int(11) NOT NULL auto_increment,
		  title VARCHAR(255),
          problemName VARCHAR (100),
          contestID VARCHAR (120),
          problemTemp VARCHAR (120),
          time time,
          userID VARCHAR (70) NOT NULL,
		PRIMARY KEY (submitID)
        )";
    if(!mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-danger">
                              <strong>Table Not Created! </strong> There was a Problem.
                            </div>' . mysqli_error($conn);
    }
?>
<?php 
	$sql="SELECT * FROM contestTable WHERE contestid='$id'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row=mysqli_fetch_assoc($result);
			$date=$row['start_date'];//echo$date;
			$today=date("Y-m-d h:i:sa");//echo$today;
			//if($date>$today){
				//echo'Ho';
			//}else
				//echo'';
			
		}
?>
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">Upload File</label>
            <div class="col-sm-8">
                <input type="file" name="fileupload">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button class="btn btn-info btn-block login" type="submit" name="submit">SUBMIT</button>
            </div>
        </div>
    </form>
<?php
    if(isset($_POST['submit'])){
        $targetFolder="ans/";
        $targetFile=$targetFolder.basename($_FILES['fileupload']['name']);
        $fileType=pathinfo($targetFile,PATHINFO_EXTENSION);
		$temp=$user.$numOfcontest;
		$date=DATE('H:i:s');
		$newfilename="ans/". $temp.".".$fileType;
		$sql="SELECT * FROM submitTable WHERE problemTemp='$numOfcontest' AND userID='$user'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			chmod($newfilename,0755); //Change the file permissions if allowed
			unlink($newfilename);
			move_uploaded_file($_FILES["fileupload"]["tmp_name"], $newfilename);
			$sql="UPDATE submitTable SET problemName='$newfilename' WHERE problemTemp='$numOfcontest' AND userID='$user'";
			if(mysqli_query($conn,$sql)){
				echo$newfilename;
				echo'<div class="alert alert-success">
						  <strong>Previous File</strong> Replaced.
						</div>';
			}
			
		}
		else if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
				&& $fileType != "gif" ){
            echo'<div class="alert alert-danger">
						  <strong>Only </strong> Image File Allowed.
						</div>';
        }
        else
        {
            if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $newfilename)){
				$sql="INSERT INTO submitTable(problemName,contestID,problemTemp,time,userID)
				VALUE('$newfilename','$contestID','$numOfcontest','$date','$user')";
				if(mysqli_query($conn,$sql)){
					echo'<div class="alert alert-success">
						  <strong>File </strong> Uploaded.
						</div>';
				}else
					echo''.mysqli_error($conn);
				
			}
              
            else
                echo "There was a problem";
        }
    }

	?>