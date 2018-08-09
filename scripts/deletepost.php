<?php
session_start();
include("../Includes/connect.php");
if(isset($_SESSION["user"]))
{

    $pppid=$_GET["pid"];

  //  $query4="DELETE FROM report WHERE report . Pid = $pppid";
     $query5="DELETE FROM posts WHERE posts . Postid = $pppid";

    if($con){
     //   mysqli_query($con,$query4);
        mysqli_query($con,$query5);
        }

        unset($_GET["pid"]);
       header('Location: http://localhost/webproject/ownpage.php');
    

}

//    header('Location: http://localhost/webproject/index.php');
//"INSERT INTO category(catName) VALUES ('$catname')";CURRENT_TIMESTAMP(6).000000
?>