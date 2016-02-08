
   <div class = "container">
		<div class="wrapper">
			<form action="" method="POST" name="Login_Form" class="form-signin">       
				<h3 class="form-signin-heading">Please Sign In</h3>
				  <hr class="colorgraph"><br>
				  
				  <input type="text" class="form-control" name="user" placeholder="Username" required="" autofocus="" />
				  <input type="password" class="form-control" placeholder="password" name="password" required=""/>     		  
				 
				  <button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Login</button>  			
			</form>			
		</div>
	</div>

<?php
	if(isset($_POST['submit'])) {
		$username = $_POST['user'];
		$pass = $_POST['password'];
		$_SESSION['username']=$username;
		$_SESSION['password']=$pass;
		if(isset($_GET['id'])){
			$id=$_GET['id'];
		}else
			$id=NULL;
		
		$_SESSION['id']=$id;
		$sql="SELECT * FROM addContestant WHERE LogId='$username' AND PassCode='$pass' AND contestID='$id'";
		$result = mysqli_query($conn, $sql);
		$sql2="SELECT * FROM judgeTable WHERE JudgeName='$username' AND Password='$pass'";
		$result2 = mysqli_query($conn, $sql2);
		if(isset($_GET['id'])){
			if(mysqli_num_rows($result) > 0){
				//header("location:contestant_home.php");	
				$url='contestant_home.php';
				echo '<script>window.location = "'.$url.'";</script>';
				//echo'Hello Contestant';
			}
			else
				echo'<div class="alert alert-warning">
							<strong>You Are not Registered</strong>.
						</div>';
				
		}else if(mysqli_num_rows($result2) > 0){
			//echo'Hi Judge';
			//header("location:judge_home.php");	
			$url='judge_home.php';
			echo '<script>window.location = "'.$url.'";</script>';
		}else if($username=='admin' && $pass=='pass'){
			//header("location:admin_home.php");
			$url='admin_home.php';
			echo '<script>window.location = "'.$url.'";</script>';
			
		}else
			echo'<div class="alert alert-warning">
			<strong>You Are Not Authenticated</strong>';
	}

?>






