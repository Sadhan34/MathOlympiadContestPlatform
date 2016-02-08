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

    <h4 class="title_style">You are going to Add Problem for <?php echo$contest;?></h4>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">Problem Category</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="problem_title" name="problem_title" placeholder="Problem Title" required="required">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">Upload File</label>
            <div class="col-sm-8">
                <input type="file" name="fileupload">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default" name="submit">Upload</button>
            </div>
        </div>
    </form>

</div>
<?php
	$_SESSION['number']=1;
	$sql="CREATE TABLE IF NOT EXISTS problemset(
		problemID int(5) AUTO_INCREMENT,
		problemTitle VARCHAR(255),
		problemName VARCHAR(100),
		contestID INT(5),
		PRIMARY KEY(problemID)
	)";
	
	if(!mysqli_query($conn,$sql)){
		echo'There was a problem';
	}
	
	if(isset($_POST['submit'])){
		$targetFolder="problemset/";
        $targetFile=$targetFolder.basename($_FILES['fileupload']['name']);
        $fileType=pathinfo($targetFile,PATHINFO_EXTENSION);
		$temp=$contestID.date('dms');//echo$temp;
		$newfilename="problemset/". $temp.".".$fileType;
		if(file_exists($newfilename)){	
		echo'<div class="alert alert-danger">
						  <strong>Duplicate Found!</strong> Please Upload again.
						</div>';
			$newfilename="problemset/". $temp=rand(50,100).".".$fileType;
				
		}
		
        else if($fileType!='pdf' && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
				&& $fileType != "gif")
        {
            echo'<div class="alert alert-danger">
						  <strong>Please Upload a PDF File</strong>
						</div>';
        }
        else
        {
            if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $newfilename)){
				$title=$_POST['problem_title'];
				$sql="INSERT INTO problemset(problemName,problemTitle,contestID)
				Value('$newfilename','$title','$contestID')";
				if(!mysqli_query($conn,$sql)){
					
					echo'<div class="alert alert-success">
						  <strong>Try Again! </strong> There was a Problem.
						</div>'.mysqli_error($conn);
					
				}else{
					echo'<div class="alert alert-success">
						  <strong>Problem!</strong> Uploaded.
						</div>';
					 //echo("<script>location.href = 'ticket_page.php';</script>");
				}
				
				
			}
              
            else
                echo "There was a problem";
        }

    }

?>