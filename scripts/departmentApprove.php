<?php

include('../Includes/connect.php');
$id=$_REQUEST["id"];
$query0="UPDATE department SET status = 'approved' where Did = {$id}";
$res0=mysqli_query($con,$query0);
if($res0>0)
{
    echo $id;
} 


?>