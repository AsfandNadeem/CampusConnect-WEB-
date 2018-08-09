<?php
session_start();
if(isset($_SESSION["user"])){
     include('Includes/connect.php'); 
     $query8="SELECT  * FROM user WHERE Usid ={$_SESSION["user"]}";
     $result8=mysqli_query($con,$query8);
     while($row8=mysqli_fetch_assoc($result8))
     {
         $personid=$row8['Pid'];
         $query9="SELECT  * FROM person WHERE Pid ={$row8['Pid']}";
         $result9=mysqli_query($con,$query9);
         while($row9=mysqli_fetch_assoc($result9))
         {
                   $loggedOnUser=$row9['Pname'];
         }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile change</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    include("/Includes/links.php");
    ?> 
</head>
<body>
    <?php
    include('Includes/connect.php'); 
    ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="passchange.php" method="POST">
					<span class="login100-form-title">
						Change Password of <?php echo $loggedOnUser; ?>
					</span>

					
					 <div class="wrap-input100 validate-input" data-validate = "Password is required">
					 	<input class="input100" type="password" name="previouspass" placeholder="Current-Password">
					 	<span class="focus-input100"></span>
					 	<span class="symbol-input100">
					 		<i class="fa fa-lock" aria-hidden="true"></i>
					 	</span>
                     </div>

                     <div class="wrap-input100 validate-input" data-validate = "Password is required">
					 	<input class="input100" type="password" name="newpass" placeholder="New-Password">
					 	<span class="focus-input100"></span>
					 	<span class="symbol-input100">
					 		<i class="fa fa-lock" aria-hidden="true"></i>
					 	</span>
                     </div>
                    
                 

					<div class="container-login100-form-btn">
						<button name="changepassbtn" class="login100-form-btn">
							Confirm
						</button>
                    </div>
                    
                    <div class="text-center p-t-136">
						<a class="txt2" href="scripts/logout.php">
							Log-out
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

                </form>
                

                <?php

                    if(isset($_POST["changepassbtn"]))
                    {
                        $newpass=$_POST["newpass"];
                        $prevpass=$_POST["previouspass"];
                    $query16="SELECT  * FROM user WHERE Pid ={$personid}";
                        $result16=mysqli_query($con,$query16);
                        while($row16=mysqli_fetch_assoc($result16))
                        {
                            $previouspass=$row16['password'];
                        }
                        
                        if($prevpass==$previouspass)
                        {
                       
                        $con=mysqli_connect("localhost","root","","campusconnect");
                        //UPDATE `person` SET `Pname` = 'Aqib123', `Pphone` = '0313324232131213', `Page` = '2018-12-041212' WHERE `person`.`Pid` = 21
                      //  $query="INSERT INTO `person`(`Pname`, `Pphone`, `Page`) VALUES ('$name','$phone','$date')";
                      //UPDATE `user` SET `username` = 'ab@gmail.comds', `password` = '1234567ds' WHERE `user`.`Usid` = 94
                      $query="UPDATE user SET password = '$newpass' WHERE user. Pid= '$personid'";
                        mysqli_query($con,$query);
                                                     
                                        echo "<script> alert('Password Changed'); </script>";
                                        unset($_POST["changepassbtn"]);
                        }

                        else{
                            echo "<script> alert('Previous password is different'); </script>";
                        }
                    }
                ?>
			</div>
		</div>
	</div>
	
	

<!--  -->

</body>
</html>