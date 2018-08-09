<?php

include('../Includes/connect.php');
$id=$_REQUEST["id"];
$query2="DELETE from report where Rid = {$id}";
$res2=mysqli_query($con,$query2);
if($res2>0)
{
    echo $id;
}
?>