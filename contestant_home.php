<?php
    session_start();
    include('mysql_connect.php');
    $usercheck=$_SESSION['username'];
    if(!$usercheck)
    {
        header("Location: index.php");
    }
    $id=$_SESSION['id'];//echo$id;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Math Olympiad</title>
<link rel='shortcut icon' type='image/x-icon' href='img/igen-logo.png' />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="contestant_home.php">Contestants Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-left top-nav">
					<li>
						<a href="?page=rank"><i class="fa fa-fw fa-dashboard"></i>Rank List</a>
					</li>
					<li>
						<a href="?page=my_submission"><i class="fa fa-fw fa-desktop"></i>My Submission</a>
					</li>
				</ul>
				 <ul class="nav navbar-right top-nav">
					
					<li>
						<a href="#"><i class="fa fa-user"></i><?php echo$usercheck;?><b class="caret"></b></a>
					</li>
					<li>
						<a href="logout.php"><i class="fa fa-lock"></i> Logout<b class="caret"></b></a>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<div class="row">
		<h4 id="countdown"class="text-danger text-center pad-bot"></h4>
		<div class="col-sm-10 col-sm-offset-1">
			<?php
				if(isset($_GET["page"])) {
			    if($_GET['page']=='view_pdf'){
					if($id){
					$sql="SELECT * FROM contestTable WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						$row=mysqli_fetch_assoc($result);
                        $_SESSION['contestName']=$row['contestName'];
						echo'<h4 class="text-center"><strong>'.$row['contestName'].'</strong></h4>
						<ul class="nav nav-tabs">

                      ';
					}
			
			        $numOfcontest='A';
					$sql="SELECT * FROM problemset WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						while($row=mysqli_fetch_assoc($result)){
							$pdf=$row['problemName'];
							$title=$row['problemTitle'];
                            $contest=$row['contestID'];
							echo'  <li role="presentation" class="active"><a href="?page=view_pdf&&contestID='.$contest.'&&id='.$pdf.'&&numOfcontest='.$numOfcontest.'">
								<h4>';echo '<strong>'.$numOfcontest." </strong>"./*$row['problemTitle'].*/'</h4></li> ';
								
							echo'</a>';
                            $numOfcontest++;
						}
					}
					else
						echo'<div class="alert alert-warning">
  <strong>Problem!</strong> Not Found.
</div>';	
			
		}
                    include('view_pdf.php');
					include('contestant_upload.php');
				}else if($_GET['page']=='my_submission'){
                    include('my_submission.php');
				}else if($_GET['page']=='rank'){
					//$contID=$id;
                    include('rank.php');
				}
			}else{
				if($id){
			$sql="SELECT * FROM contestTable WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						$row=mysqli_fetch_assoc($result);
                        $_SESSION['contestName']=$row['contestName'];
						echo'<h4 class="text-center"><strong>'.$row['contestName'].'</strong></h4><hr>
						<ul class="nav nav-tabs">

                      ';
					}
			
			        $numOfcontest='A';
					$sql="SELECT * FROM problemset WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						while($row=mysqli_fetch_assoc($result)){
							$pdf=$row['problemName'];
                            $contest=$row['contestID'];
							echo'  <li role="presentation" class="active"><a href="?page=view_pdf&&contestID='.$contest.'&&id='.$pdf.'&&numOfcontest='.$numOfcontest.'">
								<h4>';echo '<strong>'.$numOfcontest." </strong>"./*$row['problemTitle'].*/'</h4></li> ';
								
							echo'</a>';
                            $numOfcontest++;
						}
					}
					else
						echo'<div class="alert alert-warning">
  <strong>Problem!</strong> Not Found.
</div>';	
			
		}
			}
			?>
		</div>
	</div>
<div class="footer-area">
	<div class="text-center">
		© Team Innominate
	</div>
</div>
<?php 
	$sql="SELECT * FROM contestTable WHERE contestid='$id'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row=mysqli_fetch_assoc($result);
			$date=$row['start_date'];//echo$date;
		}
?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script><script>
	var m="<?php print($date); ?>"
	var end = new Date('01/9/2016 11:0 PM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'Contest Is Running!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        //document.getElementById('countdown').innerHTML = days + 'Days ';
        document.getElementById('countdown').innerHTML = hours + 'Hrs ';
        document.getElementById('countdown').innerHTML += minutes + 'Mins ';
        document.getElementById('countdown').innerHTML += seconds + 'Secs Remaining';
    }

    timer = setInterval(showRemaining, 1000);
</script>


</body>

</html>







