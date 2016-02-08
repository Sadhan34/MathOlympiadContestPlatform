<?php

	$count=0;
	$contestID=$_GET['contestID'];//echo$contestID;
	$sql="SELECT * FROM submitTable WHERE contestID='$contestID' ORDER BY time";
	$result=mysqli_query($conn,$sql);
	echo'<div class="default-border">
			<h5><strong>All Submission</strong></h5>
		</div> ';
	if(mysqli_num_rows($result) >0){
		echo'<table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Problem</th>
                            <th>User Name</th>
                            <th>Submission Time</th>
                            
                        </tr>';
		while($row=mysqli_fetch_assoc($result)){
			$count++;
			echo'<tr>
				<td>';echo$count.'</td>
		<td>';echo'<a href="?page=score&&contestID='.$contestID.'&&problemID='.$row['problemTemp'].'&&user='.$row['userID'].'"> <div style="height:100%;width:100%">'.$row['problemTemp'].' </div></a></td>
				<td>';echo'<a href="?page=score&&contestID='.$contestID.'&&problemID='.$row['problemTemp'].'&&user='.$row['userID'].'"> <div style="height:100%;width:100%">'.$row['userID'].'</td>
				<td>';echo'<a href="?page=score&&contestID='.$contestID.'&&problemID='.$row['problemTemp'].'&&user='.$row['userID'].'"> <div style="height:100%;width:100%">'.$row['time'].'</td>
				
			</tr>';
			
			
		}
		
	}else
		echo'<div class="alert alert-danger">Result Not found</div>';
	
?>
</table>
