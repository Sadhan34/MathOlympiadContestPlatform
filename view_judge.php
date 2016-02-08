
<div class="colorDiv">

    <div class="row">
        <div class="col-lg-12">
            <h3 style="color: #828282; text-align: center;">Judge's</h3>
           
        </div>
    </div>

    <?php
    include('mysql_connect.php');
	$id=$_GET['id'];
    $sql="SELECT * FROM judgeTable WHERE contestID='$id'";
    $result=mysqli_query($conn,$sql);
    ?>

    <table class="table table-bordered table-hover">
        <?php
		 $numOfcontest=0;
        if(mysqli_num_rows($result) > 0){
            echo '
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Admin Name</t>
                            <th>Password</th>
                            <th>Delete</th>
                            
                        </tr>
                    ';
            while($row=mysqli_fetch_assoc($result)){
				 $numOfcontest++;
                echo "<tr>";
                echo ('<td>'.$numOfcontest.'</td>');
                echo ('<td>'.$row['JudgeName'].'</td>');
                echo ('<td>'.$row['Password'].'</td>');
                //echo '<td><a href="edit.php?id=' . $row['Jid'] . '">Edit</a></td>';
                echo '<td><a href="delete_judge.php?id=' . $row['Jid'] . '">Delete</a></td>';
                echo("</tr>");

            }
        }
        ?>
    </table>

</div>


