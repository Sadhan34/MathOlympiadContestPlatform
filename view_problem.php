
<div class="content_area">

    <div class="row">
        <div class="col-lg-12">
            <h3 style="color: #828282; text-align: center;">View Problems</h3>
            
        </div>
    </div>
    
			<?php
				$numOfcontest=0;
					$id=$_GET['id'];
					$sql="SELECT * FROM problemset WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						echo'<table class="table table-bordered table-hover">
        <tr>
            <th>SL</th>
            <th>Problem Title</th>
            <th>Problem File</th>
            <th>View </th>
            <th>Delete</th>
        <tr>
		<tr>';
						while($row=mysqli_fetch_assoc($result)){
							$numOfcontest++;
							echo'<td>';echo$numOfcontest.'</td>
							<td>';echo$row['problemTitle'].'</td>
							<td>';echo$row['problemName'].'</td>';
							$pdf=$row['problemName'];
							echo'<td><a href="?page=view_pdf&id='.$pdf.'">View</a></td>
							<td><a href="delete_problem.php?id=' . $row['problemID'] . '">Delete</a></td></tr>';
						}
						
					}
					else
						echo'<div class="alert alert-danger">Problem Not Found</div>';
			?>
		
    </table>

</div>


