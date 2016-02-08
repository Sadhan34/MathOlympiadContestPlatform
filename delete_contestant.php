<?php
include('mysql_connect.php');
echo $_GET['idNo'];
if(isset($_GET['idNo']))
{
    $id=$_GET['idNo'];
    $sql="DELETE FROM addContestant WHERE contestantID=$id";
    if(mysqli_query($conn,$sql))
    {
        echo "Item deleted";
        header('location:admin_home.php');

    }
    else{
        echo "Item did not deleted".mysqli_error($conn);
        header('location:admin_home.php');
    }

}

?>