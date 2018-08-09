<?php
session_start();
if(isset($_SESSION["user"])){
     include('Includes/connect.php'); 
     $query8="SELECT  * FROM user WHERE Usid ={$_SESSION["user"]}";
     $result8=mysqli_query($con,$query8);
     while($row8=mysqli_fetch_assoc($result8))
     {
         $query9="SELECT  * FROM person WHERE Pid ={$row8['Pid']}";
         $result9=mysqli_query($con,$query9);
         while($row9=mysqli_fetch_assoc($result9))
         {
             $loggedOnUser=$row9['Pname'];

         }

         $depiddd=$row8['Did'];
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="CSS/Style.css"/>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
 
</head>
<body>

<?php
 $con=mysqli_connect("localhost","root","","campusconnect");

 $str=$_GET['asfand'];

 $query="SELECT * FROM user WHERE (username LIKE '%$str%') AND Did='$depiddd'";
 if($con)
 {
 $result=mysqli_query($con,$query);
                            
 if(mysqli_num_rows($result)>0)
 {
     echo "<ul class='list-group'>";
     while($row=mysqli_fetch_assoc($result))
     {
     
     echo"<li class='list-group-item'>";
            echo" <p><a class='btn' href='searchpersonpost.php?id={$row["Usid"]}' role='button'>{$row["username"]}</a></p>";
echo"</li>";

     }
     echo "</ul>";
 }

                             
 else if(mysqli_num_rows($result)<=0)
 {
     echo "<ul class='list-group'>";
     while($row=mysqli_fetch_assoc($result))
     {
     
     echo"<li class='list-group-item'> No User";
            
echo"</li>";

     }
     echo "</ul>";
 }
 }
//  echo $str;
?>
    
    </body>
</html>