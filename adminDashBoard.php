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
    <?php include("/Includes/adminHeader.php"); 
    
    Session_start();
    if(!isset($_SESSION['Admin']))
    {
        header("LOCATION: index.php");
    }
    ?>


<div class="limiter">
		<div class="container-login100">
        <div class="wrap-login100" style="padding: 0px; width:auto;overflow: auto">


                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">UID</th>
                            <th scope="col">University Name</th>
                            <th scope="col">No of Departments</th>
                            <th scope="col">Admin Email</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Admin Phone No</th>
                          </tr>
                        </thead>
                        
                        <tbody>

                        <?php 

                        include("/Includes/connect.php");
                               
                        $query0="SELECT * from university where status = 'approved'";
                                $res0=mysqli_query($con,$query0);
                                if(mysqli_num_rows($res0)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res0))
                                        { ?>
                                            <tr>
                                            <th scope="row"><?= $row['Uid']?></th>
                                            <td><?=$row["Uname"]?></td>

                                            <?php
                                            $uid=$row['Uid'];
                                            $query1="SELECT COUNT(*) as a from department where Uid = '$uid'";
                                            $res1=mysqli_query($con,$query1);
                                             while($row1=mysqli_fetch_assoc($res1))
                                             {
                                                echo "<td>{$row1['a']}</td>";
                                             }
                                                $id=$row['Aid'];
                                             
                                            $query2="SELECT * from admin where Aid ='$id'";
                                             $res2=mysqli_query($con,$query2);
                                              while($row2=mysqli_fetch_assoc($res2))
                                              {
                                                echo "<td>{$row2['Ausername']}</td>";
                                                
                                                $Pid=$row2['Pid'];
                                                $query3="SELECT * from person where Pid ='$Pid'";
                                                $res3=mysqli_query($con,$query3);
                                                 while($row3=mysqli_fetch_assoc($res3))
                                                 {
                                                
                                                 echo "<td>{$row3['Pname']}</td>";
                                                 echo "<td>{$row3['Pphone']}</td>";
                                                 
                                              }

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