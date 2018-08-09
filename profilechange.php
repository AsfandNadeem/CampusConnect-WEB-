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

				<form class="login100-form validate-form" action="profilechange.php" method="POST">
					<span class="login100-form-title">
						Change Profile of <?php echo $loggedOnUser; ?>
					</span>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div> -->

					<!-- // <div class="wrap-input100 validate-input" data-validate = "Password is required">
					// 	<input class="input100" type="password" name="pass" placeholder="Password">
					// 	<span class="focus-input100"></span>
					// 	<span class="symbol-input100">
					// 		<i class="fa fa-lock" aria-hidden="true"></i>
					// 	</span>
                    // </div> -->
                    
                    <div class="wrap-input100 validate-input" data-validate = "Name required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Phone no required">
						<input class="input100" type="number_format" name="phone" placeholder="Phone No">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Date required">
						<input class="input100" type="date" name="date">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-calendar-o" aria-hidden="true"></i>
						</span>
                    </div>

                    <!-- <div class="form-group">
                    <label for="uni">University:</label>
                    <select class="form-control" name="uni" id="uni" require>
                    <option disabled selected value> Select a University </option>
                  
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="dep">Department:</label>
                    <select class="form-control" name="dep" id="dep" require>
                    <option disabled selected value> Select a Department </option>
                    <option ></option>
                    </select>
                    </div> -->

					<div class="container-login100-form-btn">
						<button name="changeprofilebtn" class="login100-form-btn">
							Confirm
						</button>
                    </div>
                    
                    <div class="text-center p-t-136">
						<a class="txt2" href="homepage.php">
							Homepage
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

                </form>
                

                <?php

                    if(isset($_POST["changeprofilebtn"]))
                    {
                        
                        $name=$_POST["name"];
                        $date=$_POST["date"];
                        $phone=$_POST["phone"];
                        $con=mysqli_connect("localhost","root","","campusconnect");
                        //UPDATE `person` SET `Pname` = 'Aqib123', `Pphone` = '0313324232131213', `Page` = '2018-12-041212' WHERE `person`.`Pid` = 21
                      //  $query="INSERT INTO `person`(`Pname`, `Pphone`, `Page`) VALUES ('$name','$phone','$date')";
                      $query="UPDATE person SET Pname = '$name', Pphone = '$phone', Page = '$date' WHERE person. Pid= '$personid'";
                        mysqli_query($con,$query);
                                                     
                                        echo "<script> alert('Profile Changed'); </script>";
                                        unset($_POST["changeprofilebtn"]);
                    }
                ?>
			</div>
		</div>
	</div>
	
	

<!--  -->

</body>
</html>