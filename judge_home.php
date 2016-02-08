<?php
    session_start();
    include('mysql_connect.php');
    $usercheck=$_SESSION['username'];
    if(!$usercheck)
    {
        header("Location: index.php");
    }
    $id=$_SESSION['id'];
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
                <a class="navbar-brand" href="judge_home.php">Judge Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (!empty($_GET['contestID'])){
					$id=$_GET['contestID'];
					//$contestID=$_GET['contestID'];
					echo'<ul class="nav navbar-left top-nav">
					<li>
						<a href="?page=rank_list&&contestID='.$id.'"><i class="fa fa-fw fa-dashboard"></i>Rank List</a>
					</li>
					
				</ul>';
				}else
					?>
				<!---->
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
		<div class="col-sm-8 col-sm-offset-2 padding_top">
		<!--<div class="col-sm-4 padding_top">-->
        
			<?php
				if(isset($_GET['page'])){
					if($_GET['page']=='judge'){
						include('check_judge.php');
					}else if($_GET['page']=='score'){
						include('marksheet.php');
					
					}else if($_GET['page']=='rank_list'){
						include('rank.php');
					}
				}else{
					echo'<div class="default-border">
			<h5><strong>All Contest</strong></h5>
		</div>';
					$numOfcontest=0;
					$sql="SELECT * FROM judgeTable WHERE judgeName='$usercheck'";
					$result=mysqli_query($conn,$sql);
					mysqli_num_rows($result);
					while($row=mysqli_fetch_assoc($result)){
						$contest=$row['contestID'];
						$sql2="SELECT * FROM contestTable WHERE contestID='$contest'";
						$result2=mysqli_query($conn,$sql2);
						if(mysqli_num_rows($result2)){
							while($row2=mysqli_fetch_assoc($result2)){
								$numOfcontest++;
								$contest=$row2['contestName'];
								echo'<a href="?page=judge&contestID='.$row['contestID'].'"><div class="my_contest">
											<h5>';echo '<strong>'.$numOfcontest." </strong>.".$row2['contestName'].'</h5>
											<p>'.$row2['start_date'].'</p>';
											
										echo'</div></a>';
							}
						}
						else
							echo'<div class="alert alert-danger">Result Not found</div>';
					}
				}
			?>
		</div>
	</div><br>
	
	<div class="footer-area">
		<div class="text-center">
			© Team Innominate
		</div>
	</div>


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>










