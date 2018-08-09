<?php

include('../Includes/connect.php');
$id=$_REQUEST["id"];
$query2="DELETE from posts where Postid = {$id}";
$res2=mysqli_query($con,$query2);
if($res2)
{
    echo $id;
}
?>