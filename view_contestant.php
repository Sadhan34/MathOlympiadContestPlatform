
<div class="colorDiv">

    <div class="row">
        <div class="col-lg-12">
            <h3 style="color: #828282; text-align: center;">Contestant's</h3>
           
        </div>
    </div>

    <?php
    include('mysql_connect.php');
	$id=$_GET['id'];
    $sql="SELECT * FROM addContestant WHERE contestID='$id'";
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
                            <th>First Name</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Delete</th>
                        </tr>
                    ';
            while($row=mysqli_fetch_assoc($result)){
				$numOfcontest++;
                echo "<tr>";
                echo ('<td>'.$numOfcontest.'</td>');
                echo ('<td>'.$row['FullName'].'</td>');
                echo ('<td>'.$row['LogId'].'</td>');
                echo ('<td>'.$row['PassCode'].'</td>');
                echo '<td><a href="delete_contestant.php?idNo=' . $row['contestantID'] . '">Delete</a></td>';
                echo("</tr>");

            }
        }
        ?>
    </table>

</div>


