<!--comments-->


<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

	<div class="colorDiv">
		<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<label class="col-sm-3 "></label>
                <div class="col-sm-9">
                  <h4 class="text-center">Create Contest</h4><hr></div>
			
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Contest Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value=""name="contest_name" placeholder="Event Name" required="required">
                </div>
            </div>
			 <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Contest Duration</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value=""name="duration" placeholder="Duration" required="required">
                </div>
            </div>
			     <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
					<div class="input-group date form_datetime">
						<input size="16" type="text" value="" id="theDate" name="date"readonly class="form-control">
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>

                </div>
				
            </div>
            <div class="form-group ">
              <div class="col-sm-offset-3 col-sm-9">
               <button type="submit" class="btn btn-default" name="submit">Create Contest</button>
              </div>
            </div>
		</form>
	</div>

	<?php
		include('mysql_connect.php');
		
		$sql="CREATE TABLE IF NOT EXISTS contestTable(
			contestID int(11) AUTO_INCREMENT,
			contestName VARCHAR(255) NOT NULL,
			duration INT(255),
			start_date datetime,
			PRIMARY KEY(contestID)

    )";
	if(!mysqli_query($conn,$sql)){
		echo"There was an Error".mysqli_error($conn);
	}
	if(isset($_POST['submit'])){
		$contest=$_POST['contest_name'];
		$duration=$_POST['duration'];
		$date=$_POST['date'];
		$sql="INSERT INTO contestTable(contestName,duration,start_date)
		VALUE('$contest','$duration','$date')";
		if(mysqli_query($conn,$sql)){
			echo'<div class="alert alert-success">Contest Added</div>';
		}
		else
			echo'<div class="alert alert-danger">Contest Did Not added</div>'.mysqli_error($conn);
	}
	
		
	?>
	
	
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>

</body>
