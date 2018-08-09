<?php
session_start();
include("../Includes/connect.php");
if(isset($_SESSION["user"]))
{
    if(isset($_POST["postbtn"]))
    {
    $userid=$_SESSION["user"];
    $title=$_POST["posttitle"];
    $posts=$_POST["inputpost"];

    $query2="SELECT  * FROM user WHERE Usid =$userid";
    $result2=mysqli_query($con,$query2);
    while($row2=mysqli_fetch_assoc($result2))
    {
        $depID=$row2["Did"];
    }
    date_default_timezone_set("Asia/Karachi");
    $timestamp=date("Y-m-d H:i:s");
    
    $query5="INSERT INTO posts (Userid, Did, pdata, pdate, ptitle) VALUES ('$userid', '$depID', '$posts', '$timestamp', '$title')";

    if($con){
        mysqli_query($con,$query5);
        }

        unset($_POST["postbtn"]);
        header('Location: ../homepage.php');
    }

}

//    header('Location: http://localhost/webproject/index.php');
//"INSERT INTO category(catName) VALUES ('$catname')";CURRENT_TIMESTAMP(6).000000
?>