<!DOCTYPE html>
<html lang="en">
<head>
	<title>Campus Connect Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
    include("/Includes/links.php");
    ?>
</head>
<body>
	<?php session_start(); ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="index.php" method="POST">
					<span class="login100-form-title">
					Login
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
					<div class="form-group">
                    <label for="dep">Login as:</label>
                    <select class="form-control" name="adm" id="adm" require>
					<option >Admin</option>
					<option >University Admin</option>
					<option >Department Admin</option>
					<option >User</option>
                    </select>
                    </div>
					
					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	



	<?php

	include("/Includes/connect.php");
	
						if(isset($_POST["login"]))
						{
							$user=$_POST["email"];
							$pass=$_POST["pass"];
							$adm=$_POST["adm"];
	
							if($adm=="User")
							{
							$query="SELECT DISTINCT * from user where username = '$user' and password = '$pass'";
								$res=mysqli_query($con,$query);
								if(mysqli_num_rows($res)>0)
								{
									while($row=mysqli_fetch_assoc($res))
									{
										$_SESSION['user']=$row["Usid"];
										header("LOCATION: homepage.php");
										
									}
								}
								else
								{
										alert("Wrong Credentials");
								}
							}
							else
							{
								if($adm=="Admin")
								{
								$query="SELECT DISTINCT * from admin where Ausername = '$user' and Apassword = '$pass' and Atype = '$adm'";
									$res=mysqli_query($con,$query);
									
									if(mysqli_num_rows($res)>0)
									{
										while($row=mysqli_fetch_assoc($res))
										{
											$_SESSION['Admin']=$row["Aid"];
											header("LOCATION: adminDashBoard.php");
											
										}
									}
									else
									{
											alert("Wrong Credentials");
									}
								}
								elseif($adm=="University Admin")
								{
									$query="SELECT DISTINCT * from admin where Ausername = '$user' and Apassword = '$pass' and Atype = '$adm'";
									$res=mysqli_query($con,$query);
									if(mysqli_num_rows($res)>0)
									{
										while($row=mysqli_fetch_assoc($res))
										{
											$_SESSION['University Admin']=$row["Aid"];
											header("LOCATION: uniadminDashBoard.php");
											
										}
									}
									else
									{
											alert("Wrong Credentials");
									}
								}
								elseif($adm=="Department Admin")
								{
									$query="SELECT DISTINCT * from admin where Ausername = '$user' and Apassword = '$pass' and Atype = '$adm'";
									$res=mysqli_query($con,$query);
									if(mysqli_num_rows($res)>0)
									{
										while($row=mysqli_fetch_assoc($res))
										{
											$_SESSION['Department Admin']=$row["Aid"];
											header("LOCATION: depadminDashBoard.php");
											
										}
									}
									else
									{
											alert("Wrong Credentials");
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
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	

</body>
</html>