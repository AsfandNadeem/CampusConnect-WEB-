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
    <?php include("/Includes/uniadminHeader.php"); 
    
    Session_start();
    if(!isset($_SESSION['University Admin']))
    {
        header("LOCATION: index.php");
    }
    
    
    ?>


<div class="limiter">
		<div class="container-login100">
        <div class="wrap-login100" style="padding: 0px; width: auto;overflow: auto">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">DID</th>
            <th scope="col">Department Name</th>
            <th scope="col">No of Users</th>
            <th scope="col">University Name</th>
            <th scope="col">Admin Email</th>
            <th scope="col">Admin Name</th>
            <th scope="col">Admin Phone No</th>
            <th scope="col" colspan="2"></th>
          </tr>
        </thead>
        
        <tbody>

        <?php 

        include("/Includes/connect.php");
               
        $aid=$_SESSION['University Admin'];
        $query5="SELECT * from university where Aid = '$aid'";
        $res5=mysqli_query($con,$query5);
        if(mysqli_num_rows($res5)>0)
            {
                while($row5=mysqli_fetch_assoc($res5))
                {
                    $uid=$row5["Uid"];
                }
            }

        $query0="SELECT * from department where Uid='$uid' and status = 'not approved'";
                $res0=mysqli_query($con,$query0);
                if(mysqli_num_rows($res0)>0)
                    {
                        while($row=mysqli_fetch_assoc($res0))
                        { ?>
                            <tr id='<?=$row['Did']?>'>
                            <th scope="row"><?= $row['Did']?></th>
                            <td><?=$row["Dname"]?></td>

                            <?php


                            $did=$row['Did'];
                            $query4="SELECT COUNT(*) as a from user where Did = '$did'";
                            $res4=mysqli_query($con,$query4);
                             while($row4=mysqli_fetch_assoc($res4))
                             {
                                echo "<td>{$row4['a']}</td>";
                             }

                            $uid=$row['Uid'];
                            $query1="SELECT * from university where Uid = '$uid'";
                            $res1=mysqli_query($con,$query1);
                             while($row1=mysqli_fetch_assoc($res1))
                             {
                                echo "<td>{$row1['Uname']}</td>";
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
                                            echo "<td colspan='2' ><button data-id='{$row['Did']}'   type='button' class='btn btn-primary approve'>Approve</button>
                                            <button type='button' data-id={$row['Did']}  class='btn btn-danger disapprove'>Disapprove</button></td>";
                                            echo "</tr>";
                                        }
                                    }
                                
                                ?>
                                     
                                    </tbody>
                                  </table>

        </div>
        </div>
</div>


<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>


<script>
    $(".approve").click(function()
        {
           
           var id=$(this).data("id");
            $.ajax(
                { url: "scripts/departmentApprove.php", 
                    type:"POST",
                    data:{"id":id},
                        context:this,
                  success: function(result)
                  {
                            document.getElementById(id).remove();
                            
                },
                error:function(xhr,ajaxOption,thrownErr)
            {
                    alert(thrownErr);
            }
            }
            
        );
        });
        $(".disapprove").click(function()
        {
            
            var id=$(this).data("id");
            $.ajax(
                { url: "scripts/departmentDisapprove.php", 
                    type:"POST",
                    data:{"id":id},
                        context:this,
                  success: function(result)
                  {
                            document.getElementById(id).remove();
                            
                },
                error:function(xhr,ajaxOption,thrownErr)
            {
                    alert(thrownErr);
            }
            }
            
        );
        });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>