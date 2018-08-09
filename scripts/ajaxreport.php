<?php
session_Start();
include("../Includes/connect.php");
if(isset($_SESSION["user"]))
{
 $str=$_REQUEST['postreport'];
 $userid=$_SESSION["user"];
 $postid=$_REQUEST["id"];
echo $str;
echo $userid;
echo $postid; 
 $query="INSERT INTO report ( Userid, Pid, message) VALUES ( '$userid', '$postid', '$str')";
 if($con){
    $res=mysqli_query($con,$query);
    if($res>0)
    {
        echo "ok";
    }
    }
}
?>