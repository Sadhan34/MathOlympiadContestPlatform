
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Judge Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div class="main-wrapper-onepage main oh">
		<!-- Second navbar for sign in -->
			    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="judge_home.php">Judge Panel</a>
					</div>
					<!-- Top Menu Items -->
					<ul class="nav navbar-right top-nav">
						<li>
							<a href="#"><i class="fa fa-user"></i>Judge<b class="caret"></b></a>
						</li>
						<li>
							<a href="index.php"><i class="fa fa-user"></i> Logout<b class="caret"></b></a>
						</li>
					</ul>
					<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
					<?php include('judge_left_sidebar.php'); ?>
					<!-- /.navbar-collapse -->
				</nav>
		<!-- Page Title -->
					<section class="page-title text-center" id="cnv">
					
					<canvas id="spiders" width="100%"></canvas>
						<div class="container relative clearfix">
						<h1 class="main-title">MATH OLYMPIAD<br/><span>ONLINE Judge</span></h1>	
						</div> <!-- end container -->
					</section> <!-- end page title -->

		</div> <!-- end main-wrapper -->

		<div class="home-content">
			<div class="container">
				<h3 class="boost_heading">CONTEST SUMMARY</h3>
				<div class="bottom_border"></div>
				<div class="col-md-6">
					<h4 class="panel_heading">UPCOMING CONTEST</h4>
					<ul class="list-group">
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
					</ul>
				</div>
				<div class="col-md-6">
					<h4 class="panel_heading">PAST CONTEST</h4>
					<ul class="list-group">
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
						<a href="#"><li class="list-group-item">Daffodil Intra University Math Olympiad Contest One<p>Starts: 17th August 2015, 9.45pm</p></li></a>
					</ul>
				</div>
			</div>
		</div>
		<!--Developer Area-->
		<div class="developer-area">
			<div class="container text-center">
				<h3 class="boost_heading">DEVELOPER </h3>
				<div class="bottom_border"></div>
				<div class="row col-md-4 col-md-offset-4">
					<div class="col-md-9"> 
						<img src="img/motiur.jpg" class="img-circle" alt="Motiur" width="100%" height="100%"> 
						<h4>Motiur Rahaman</h4>
						<p>-Developer</p>
					</div>
				</div>
				<div class="row col-md-8 col-md-offset-2">
					<div class="col-md-4 col"> 
						<img src="img/motiur.jpg" class="img-circle" alt="Motiur" width="100%" height="100%"> 
						<h4>Motiur Rahaman</h4>
						<p>-Developer</p>
					</div>
					<div class="col-md-4 col"> 
						<img src="img/motiur.jpg" class="img-circle" alt="Motiur" width="100%" height="100%"> 
						<h4>Motiur Rahaman</h4>
						<p>-Developer</p>
					</div>
					<div class="col-md-4 col"> 
						<img src="img/motiur.jpg" class="img-circle" alt="Motiur" width="100%" height="100%"> 
						<h4>Motiur Rahaman</h4>
						<p>-Developer</p>
					</div>
				</div>
				
			</div>
		</div><!--Developer Area End-->
		
		<!--Footer Area-->
		<div class="footer-area">
			<div class="container text-center">
				
				<p>Developed By</p>
				
			</div>
		</div><!--Developer Area End-->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>	
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/canvas-vas.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>


</body>

</html>



