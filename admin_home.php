
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
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

<div id="wrapper" class="hello">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin_home.php">Admin Panel</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li>
                <a href="#"><i class="fa fa-user"></i> Admin<b class="caret"></b></a>
            </li>
            <li>
                <a href="logout.php"><i class="fa fa-lock"></i> Logout<b class="caret"></b></a>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="row">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li class="active">
						<a href="admin_home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
					</li>
					<li>
						<a href="?page=add_contest"><i class="fa fa-fw fa-plus"></i> Add Contest</a>
					</li> 
					
				</ul>
			</div>

		</div>
		
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="col-sm-10 col-sm-offset-1">
            <?php
				session_start();
				$id='g';
				include('mysql_connect.php');
				$usercheck=$_SESSION['username'];
				if($usercheck!="admin")
				{
					header("Location: index.php");
				}else
					echo'<div class="text-center">Welcome! <strong>'.$usercheck.'</strong></div>';
				
				if(isset($_GET['page'])){
					if($_GET['page']=='add_contest'){
						include('add_contest.php');
					}else if($_GET['page']=='add_problem'){
						include('add_problem.php');
					}else if($_GET['page']=='view_problem'){
						include('view_problem.php');
					}
					else if($_GET['page']=='delete_contest'){
						include('delete_contest.php');	
					}else if($_GET['page']=='add_contestant'){
						include('add_contestant.php');
					}
					else if($_GET['page']=='view_contestant'){
						include('view_contestant.php');	
					}else if($_GET['page']=='add_judge'){
						include('add_judge.php');	
					}else if($_GET['page']=='view_judge'){
						include('view_judge.php');	
					}else if($_GET['page']=='view_pdf'){
						include('view_pdf.php');	
					}
				}
				else{
					echo'<div class="default-border">
			<h4><strong>All Contest</strong></h4>
		</div>';
					$numOfcontest=0;
					$sql="SELECT * FROM contestTable ORDER BY contestID DESC";
					$result=mysqli_query($conn,$sql);
					 if(mysqli_num_rows($result) >0){
						
						while($row=mysqli_fetch_assoc($result)){
							$numOfcontest++;
							echo'<div class="my_contest">
								<h4>';echo '<strong>'.$numOfcontest." </strong>.".$row['contestName'].'</h4>
								<p>'.$row['start_date'].'</p>';
								$value=$row['contestID'];
								echo'<a class="placement" href="?page=add_problem&id='.$value.'">Add Problem</a>
								<a class="placement"href="?page=add_contestant&id='.$value.'">Add Contestant</a>
								<a class="placement" href="?page=add_judge&id='.$value.'">Add Judge</a>
								<a class="placement"href="?page=view_contestant&id='.$value.'">View Contestant</a>
								<a class="placement" href="?page=view_judge&id='.$value.'">View Judge</a>
								<a class="placement" href="?page=view_problem&id='.$value.'">View Problem</a>
								<a class="placement" href="?page=delete_contest&id='.$value.'">Delete</a>
								
							</div>
							';

						}
					}else
						echo'<div class="alert alert-danger">Contest Is Empty</div>';
					
							}

            ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
	
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



