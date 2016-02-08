<div class="login-container">
        <div id="output"></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form action="" method="POST">
                <input name="user" type="text" placeholder="Username">
                <input type="password" placeholder="password" name="password">
                <button class="btn btn-info btn-block login"  type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>









<?php
	session_start();
	include('mysql_connect.php');
	$err='';
	$urlpass='';

	if(isset($_POST['submit'])) {
		$username = $_POST['user'];
		$pass = $_POST['password'];
		$_SESSION['username']=$username;
		$_SESSION['password']=$pass;
		$sql="SELECT * FROM judgeTable WHERE JudgeName='$username' AND Password='$pass'";
		$result = mysqli_query($conn, $sql);
		if (empty($_POST['user']) || empty($_POST['password'])) {
			$err = "Form is empty";
			echo'empty';
		} elseif($username=='admin' && $pass=='password')
		{
			header("location:admin_home.php");
		}elseif(mysqli_num_rows($result) > 0){
			header("location:judge_home.php");
		}else
			echo'You are not authenticated';

	}
?>