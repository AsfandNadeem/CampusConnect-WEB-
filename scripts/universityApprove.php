<?php

include('../Includes/connect.php');
$id=$_REQUEST["id"];
$query0="UPDATE university SET status = 'approved' where Uid = {$id}";
$res0=mysqli_query($con,$query0);
if($res0>0)
{
    echo $id;
} 


?>