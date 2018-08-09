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


        $query6="SELECT * from user where Did = '$did'";
                $res6=mysqli_query($con,$query6);
                if(mysqli_num_rows($res6)>0)
                    {
                        while($row6=mysqli_fetch_assoc($res6))
                        { 
                                    $usid=$row6["Usid"];
                                    $query="Select * from report where Userid ='$usid'";
                                    $res=mysqli_query($con,$query);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $pid=$row["Pid"];
                                            $query1="Select * from posts where Postid='$pid' ORDER BY pdate";
                                            $res1=mysqli_query($con,$query1);
                                            if(mysqli_num_rows($res1)>0)
                                            {
                                                while($row1=mysqli_fetch_assoc($res1))
                                                {
                                                    ?>

                                                    <div class="card" id=<?=$pid?> style="width: 18rem;margin: 10px;">
                                                    <div class="card-body">
                                                      <h5 class="card-title"><?=$row1["ptitle"] ?> </h5>
                                                      <h6 class="card-subtitle mb-2 text-muted"><span style="color: red"><?=$row["message"] ?></span></h6>
                                                      <p class="card-text"><?=$row1["pdata"] ?></p>
                                                      <button data-id=<?=$pid?>  type='button' class='btn btn-primary approve'>Approve</button>
                                                      <button type='button' data-pid=<?=$pid?> data-id=<?=$row['Rid']?>  class='btn btn-danger disapprove'>Disapprove</button>
                                                    </div>
                                                  </div>

                                               <?php }
                                            }
                                        }
                                    }
                                }
                            }
                
                ?>

                
              

     
        </div>
</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script>
    $(".approve").click(function()
        {
           
           var id=$(this).data("id");
            $.ajax(
                { url: "scripts/reportApprove.php", 
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
            var rid=$(this).data("pid");
            $.ajax(
                { url: "scripts/reportDisapprove.php", 
                    type:"POST",
                    data:{"id":id},
                        context:this,
                  success: function(result)
                  {
                            document.getElementById(rid).remove();
                            
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