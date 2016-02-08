<hr/>
<div class="content_area">

    <div class="row">
        <div class="col-lg-12">
            <h3 style="color: #828282; text-align: center;">View Problems</h3>
            <hr>
        </div>
    </div>
	<?php
		include('mysql_connect.php');
			$numOfcontest=0;
					$id=$_GET['id'];
					$sql="SELECT * FROM problemset WHERE contestid='$id'";
					$result=mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) >0){
						while($row=mysqli_fetch_assoc($result)){
							$numOfcontest++;
							$pdf=$row['problemName'];
							echo'<a href="?page=view_pdf&id='.$pdf.'"><div class="my_contest">
								<h4>';echo '<strong>'.$numOfcontest." </strong>.".$row['problemTitle'].'</h4>';
								
							echo'</div></a>
							';
						}
					}
					else
						echo'Not found';	
		
				
			?>


</div>


