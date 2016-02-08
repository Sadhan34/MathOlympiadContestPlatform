<?php
include('mysql_connect.php');
//echo $_GET['id'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];//$id=$_GET['idNo'];
    $sql="DELETE FROM judgeTable WHERE Jid=$id";
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