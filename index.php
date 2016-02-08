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
                <a class="navbar-brand" href="index.php">
                    <!--<img src="img/igen-logo.png" alt="">-->
					Math Olympiad
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <li> <a href="?page=login"><span class="fa fa-sign-out"></span>Login</a></span></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="container bgimg">
    
        <?php
			session_start();
			include('mysql_connect.php');
				if(isset($_GET['page'])){
					if($_GET['page']=='login'){
						include('admin_login.php');
					}else if($_GET['page']=='problem'){
						//include('contestant_view_problem.php');	
						include('admin_login.php');	
					}else if($_GET['page']=='view_pdf'){
						include('view_pdf.php');
					}
					
				}else{
						echo'<div class="col-sm-4 padding_top">
        <div class="default-border">
			<h5><strong>All Contest</strong></h5>
		</div>';
							$numOfcontest=0;
							$sql="SELECT * FROM contestTable ORDER BY contestID DESC";
							$result=mysqli_query($conn,$sql);
							
							 if(mysqli_num_rows($result) >0){
								while($row=mysqli_fetch_assoc($result)){
									$numOfcontest++;
									$value=$row['contestID'];
									echo'<a href="?page=problem&id='.$value.'"><div class="my_contest">
										<h5>';echo '<strong>'.$numOfcontest." </strong>.".$row['contestName'].'</h5>
										<p>'.$row['start_date'].'</p>';
										
									echo'</div></a>
									';
								}
								echo'</div>';
							}else
							{
								echo'<div class="alert alert-danger">Result Not found</div>';
							}
								
							
							echo'<div class="col-sm-8 homepage-background  padding_top">
							<div class="col-sm-8 col-sm-offset-2">';
								$sql="SELECT * FROM contestTable ORDER BY contestID DESC LIMIT 1";
								$result=mysqli_query($conn,$sql);
								 if(mysqli_num_rows($result) >0){
									$row=mysqli_fetch_assoc($result);
								 
								echo'<h1>';echo$row['contestName'].'</h1>';
								$value=$row['contestID'];
								echo'<button type="button" class="btn btn-primary btn-lg">';echo date('d-M-Y', strtotime($row['start_date'])).'</button>
								<a href="?page=problem&id='.$value.'"><button type="button" class="btn btn-info btn-lg">Enter Contest</button></a>
							</div></div>';
							
				}		
				}
			?>

    
</div>
<div class="footer-area">
	<div class="text-center">
		© Team Innominate
	</div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>