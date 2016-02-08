<?php
	if(!empty($_SESSION['id'])){
		$id=$_SESSION['id'];//echo$id;
	}else{
		$id = $_GET['contestID'];//echo$id;
	}
	
	
	$count=0;
	$sql="select SUM(mark) AS total,userID AS user,count(mark) AS n from scoreboard WHERE contestID='$id' GROUP BY userID ORDER BY total DESC";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		echo'<table class="table table-bordered table-hover">
			<thead>
			  <tr>
				<th>#</th>
				<th>User</th>
				<th>solved</th>
				<th>Marks</th>
			  </tr>
			</thead> <tbody>';
		 while($row=mysqli_fetch_assoc($result)){
			 $count++;
			 echo'<tr>
				<td>';echo$count.'</td>
				<td>';echo$row['user'].'</td>
				<td>';echo$row['n'].'</td>
				<td>';echo$row['total'].'</td>
			  </tr>';
		 }
		 echo'<tbody></table>';
	}
?>