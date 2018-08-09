<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Signup</title>
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

				<form class="login100-form validate-form" action="signup.php" method="POST">
					<span class="login100-form-title">
						Signup
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Name required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Phone no required">
						<input class="input100" type="number" name="phone" placeholder="Phone No">
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

                    <div class="form-group">
                    <label for="uni">University:</label>
                    <select class="form-control" name="uni" id="uni" require>
                    <option disabled selected value> Select a University </option>
                    <?php
                    
                    $query0="SELECT * from university where status = 'approved'";
                    $res0=mysqli_query($con,$query0);
                    if(mysqli_num_rows($res0)>0)
                        {
                            while($row=mysqli_fetch_assoc($res0))
                            {?>
                                <option value="<?=$row['Uid']?>"><?=$row['Uname'] ?></option>
                           <?php }
                        }
                   

                    ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="dep">Department:</label>
                    <select class="form-control" name="dep" id="dep" require>
                    <option disabled selected value> Select a Department </option>
                    <option ></option>
                    </select>
                    </div>

					<div class="container-login100-form-btn">
						<button name="signup" class="login100-form-btn">
							Create Account
						</button>
					</div>

					<div class="text-center">
						<a class="txt2" href="depadminsignup.php">
							Department Not listed?
                        </a>
                        <a class="txt2" href="uniadminsignup.php">
							University not listed?
						</a>
                    </div>
                    <div class="text-center">
						<a class="txt2" href="Index.php">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                    </div>
                    
                </form>
                
                </div>
		</div>
	</div>
                <?php

                    if(isset($_POST["signup"]))
                    {
                        $user=$_POST["email"];
                        $pass=$_POST["pass"];
                        $name=$_POST["name"];
                        $date=$_POST["date"];
                        $phone=$_POST["phone"];
                        $uni=$_POST["uni"];
                        $dep=$_POST["dep"];

                        $query="INSERT INTO `person`(`Pname`, `Pphone`, `Page`) VALUES ('$name','$phone','$date')";
                        $res=mysqli_query($con,$query);
                        if($res>0)
                        {
                        $query1="SELECT DISTINCT * FROM person where Pname = '$name' and Pphone = '$phone' and Page ='$date'";
                            $res1=mysqli_query($con,$query1);
                            if(mysqli_num_rows($res1)>0)
                            {
                                while($row=mysqli_fetch_assoc($res1))
                                {
                                    $id=$row["Pid"];
                                    $query2="INSERT INTO `user`(`Pid`, `Did`, `username`, `password`) VALUES ('$id','$dep','$user','$pass')";
                                    $res2=mysqli_query($con,$query2);
                                    if($res2>0)
                                    {
                                        echo "<script> alert('Account Created'); </script>";
                                    }
                                }
                            } 
                        }
                    }
                ?>
			
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
        })
        

        $("#uni").change(function()
        {
           var id=document.getElementById("uni").value;
            $.ajax(
                { url: "scripts/departments.php", 
                    type:"POST",
                    data:{"id":id},
                        context:this,
                  success: function(result)
                  {
                    $("#dep").html(result);
                }
            });
        });

        
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>