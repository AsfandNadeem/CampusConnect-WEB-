<?php
session_start();
if(isset($_SESSION["user"])){
     include('Includes/connect.php'); 
     $ppid=$_GET["id"];
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
        }

        $query10="SELECT  * FROM user WHERE Usid ={$ppid}";
        $result10=mysqli_query($con,$query10);
        while($row10=mysqli_fetch_assoc($result10))
        {
            $query11="SELECT  * FROM person WHERE Pid ={$row10['Pid']}";
            $result11=mysqli_query($con,$query11);
            while($row11=mysqli_fetch_assoc($result11))
            {
                $SearchedUser=$row11['Pname'];
                $searchedperson=$row11['Pid'];
            }
            // $SearchedUser=$row10['Pname'];
            // $searchedperson=$row10['Pid'];
        //     $query11="SELECT  * FROM user WHERE Pid ={$searchedperson}";
        // $result11=mysqli_query($con,$query11);
        // while($row11=mysqli_fetch_assoc($result11))
        // {
        //    $searchedposts=$row11['Pid'];
            
        // }
            
        }



        // $query11="SELECT  * FROM user WHERE Pid ={$_GET["id"]}";
        // $result11=mysqli_query($con,$query11);
        // while($row11=mysqli_fetch_assoc($result11))
        // {
        //    $searchedposts=$row11['Usid'];
            
        // }
    // $query10="SELECT  * FROM person WHERE Pid ={$_GET["id"]}";
    //      $result10=mysqli_query($con,$query10);
    //      while($row10=mysqli_fetch_assoc($result10))
    //      {
    //          $SearchedUser=$row10['Pname'];
             
    //      }
}
else  {
    echo "<script>
    alert('Log-In First');
    window.location.href='http://localhost/campusconnect/index.php';
    </script>";
    header('Location: http://localhost/campusconnect/index.php');
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
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
      
      $(document).ready(function(){
  
  $("#search").keyup(function(){
      $("#search").css("background-color", "pink");

      var str=document.getElementById("search").value;
      $.ajax(
          {
              url: "ajaxr.php",
              type:"GET",
              data:{'asfand':str},
              context:this,
               success: function(data){
      $("#back_result").html(data);
       }
       });
  });

  

 
});

        </script>

</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#4267B2; border-color:#4267B2 " role="navigation">
    <img src="Images/download.jpg" class="img-rounded" width="300" height="80" >  
    <div class="bar">
    
                    <div class="inner">
                        <form mehtod="POST" action="#">
                            <input  class="search-input" type="text" name="search" id="search" placeholder="Search!"/>

                        </form>
                        <div style="color:black; background: white; " id="back_result"></div>
                        <!-- <input id="search" type="text" class="search-input" Placeholder="Search for people, places and things"/>
                        <span data-icon="&#xe000;" aria-hidden="true" class="search-btn">
                            <input type="submit" class="searchsubmit" value="">
                        </span> -->
                    </div>
                </div>
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $loggedOnUser?> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li ><a href="scripts/logout.php"><i  class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="background:#4267B2">
            <ul class="nav navbar-nav side-nav" style="background:#4267B2; top: 12.2%;">
            <li>
                    <a style="color: white"  href="homepage.php"><i class="fa fa-fw fa-user-plus"></i>  Home</a>
                </li>
                <li>
                    <a  style="color: white"  href="ownpage.php"><i class="fa fa-fw fa-user-plus"></i>  My Posts</a>
                </li>
              
            </ul>
        </div>
       
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <ul style="list-style-type: none;">
                    <li style=" float: left; margin-right: 2%"><img src="Images/19264668_466028937084869_3223838902926273182_o.jpg" class="img-rounded" width="100" height="100" >
                        </li>
                        <li style=" float: left;"><h1> <?php echo $SearchedUser ." ". $searchedperson?></h1></li>
                                       </ul>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                    <div class="container-fluid">
                            <?php
                            $con = mysqli_connect("localhost","root","","campusconnect");
                            
                            $query="SELECT  * FROM posts WHERE Userid={$ppid} ORDER BY pdate DESC";
                            
                               if($con)
                                {
                                    $result=mysqli_query($con,$query);
                            
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            echo"</br>";
                                            echo "
                            <div class='card bg-light mb-3'>";
                                        $query2="SELECT  * FROM user WHERE Usid ={$row['Userid']}";
                                        $result2=mysqli_query($con,$query2);
                                        while($row1=mysqli_fetch_assoc($result2))
                                        {
                                            $query5="SELECT  * FROM person WHERE Pid ={$row1['Pid']}";
                                            $result5=mysqli_query($con,$query5);
                                            while($row5=mysqli_fetch_assoc($result5))
                                            {
                                               
                                                echo"<div class='card-media'>
                                                <a class='card-media-container' href='searchpersonpost.php?id={$row["Userid"]}'>
                                               <h3> {$row5['Pname']}</h3>
                                                </a>
                                             </div>";
                                            }
                                     
                                        }
                                        $timestamp = strtotime($row['pdate']);
                                        $newDate = date('D M j G:i', $timestamp); 
                                         echo"
                                        <h5 class='card-heading '>{$row["ptitle"]}</h5> 
                               <div class='card-body'>
                              <p class='card-text'>
                               {$row["pdata"]}</p>
                               </div>
                               <div class='card-heading-header'>
                                    <span>{$newDate}</span>";
                                 
                                  $query3="SELECT  * FROM department WHERE Did ={$row['Did']}";
                                        $result3=mysqli_query($con,$query3);
                                        while($row2=mysqli_fetch_assoc($result3))
                                        {
                                            echo"<span><a  href='#'> {$row2["Dname"]} </a> </span>";
                                            $query4="SELECT  * FROM university WHERE Uid ={$row2['Uid']}";
                                        $result4=mysqli_query($con,$query4);
                                        while($row4=mysqli_fetch_assoc($result4))
                                        {
                                            echo"<span><a  href='#'> {$row4["Uname"]} </a> </span>";
                                        }
                                        }
                                       echo" </div>";
                                      echo" <div class='card-actions'>";  ?>
                                            
                                           
                                       
                                     
                                      <?php
                                      echo" </div>";
                                        }
                                    }
                                }
                                
                            
                            ?> 
                            
                    </div>
                  
                </div>
        </div>
        <!-- /.container-fluid -->
    </div>



    <!-- <script>
        $("#logoutclk").click(function()
        {
            var str=document.getElementById("logoutclk").value;
        $.ajax(
            {
                url: "logout.php",
                type:"GET",
                data:{'asfand':str},
                context:this,
                 success: function(data){
        $(".div1").html(data);
         }
         });
        }

        );

    </script> -->
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

            
</body>
</html>