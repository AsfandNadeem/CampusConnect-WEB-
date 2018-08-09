<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include("/Includes/links.php");
    ?>
    <title>Admin Pannel</title>
</head>
<body>
    <?php include("/Includes/depadminHeader.php"); 
    
    Session_start();
    if(!isset($_SESSION['Department Admin']))
    {
        header("LOCATION: index.php");
    }

    ?>


<div class="limiter">
		<div class="container-login100">
        <div class="wrap-login100" style="padding: 0px;width:auto;overflow: auto;overflow: auto">


                <table class="table  " >
                        <thead>
                          <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">No of posts</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">DOB</th>
                          </tr>
                        </thead>
                        
                        <tbody>

                        <?php 

                        include("/Includes/connect.php");
                               
                        $aid=$_SESSION['Department Admin'];
                        $query5="SELECT * from department where Aid = '$aid'";
                        $res5=mysqli_query($con,$query5);
                        if(mysqli_num_rows($res5)>0)
                            {
                                while($row5=mysqli_fetch_assoc($res5))
                                {
                                    $did=$row5["Did"];
                                }
                            }


                        $query0="SELECT * from user where Did = '$did'";
                                $res0=mysqli_query($con,$query0);
                                if(mysqli_num_rows($res0)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res0))
                                        { ?>
                                            <tr>
                                            <th scope="row"><?= $row['Usid']?></th>

                                            <?php


                                            $usid=$row['Usid'];
                                            $query4="SELECT COUNT(*) as a from posts where Userid = '$usid'";
                                            $res4=mysqli_query($con,$query4);
                                             while($row4=mysqli_fetch_assoc($res4))
                                             {
                                                echo "<td>{$row4['a']}</td>";
                                             }

                                             echo "<td>{$row['username']}</td>";
                                                
                                                $Pid=$row['Pid'];
                                                $query3="SELECT * from person where Pid ='$Pid'";
                                                $res3=mysqli_query($con,$query3);
                                                 while($row3=mysqli_fetch_assoc($res3))
                                                 {
                                                
                                                 echo "<td>{$row3['Pname']}</td>";
                                                 echo "<td>{$row3['Pphone']}</td>";
                                                 echo "<td>{$row3['Page']}</td>";
                                                 
                                                 }

                                                 echo "</tr>";
                                            }
                                        }
                                
                                
                                ?>
                                     
                                    </tbody>
                                  </table>

        </div>
        </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>