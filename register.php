<?php
 	require 'dbconfig/config.php';
 	session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #ecf0f1">

	<div class="main-wrapper">
		<center><h2>Register</h2></center>
	

	<form class="main-form" action="register.php" method="post">

		<label>Name</label>
		<input type="text" name="name" placeholder="Enter your Name" class="input-form" required> <br>

		<label>Email</label>
		<input type="email" name="email" placeholder="Enter your Email" class="input-form" required><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Enter your Password" class="input-form" required><br>

		<label>Confirm Password</label>
		<input type="password" name="confirmpassword" placeholder="Confirm Password" class="input-form" required><br>

		<label>Phone Number</label>
		<input type="text" name="phonenumber" placeholder="Enter your Phone Number" class="input-form"><br>

		<label>Address</label>
		<input type="text" name="address" placeholder="Enter your Address" class="input-form"><br>

		<center>
			<a href="index.php"><input class="backto-btn" type="button" value="Back to Login Page"></button></a>
			<button class="signup-btn" name="submit_btn" type="submit">Submit</button>
		</center>
	</form>

	<?php 
		if(isset($_POST['submit_btn']))
		{

			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirmpassword = $_POST['confirmpassword'];
			$phonenumber = $_POST['phonenumber'];
			$address = $_POST['address'];

			if($password==$confirmpassword) 
			{
				$query= "select * from users WHERE name ='$name' ";

				$query_run = mysqli_query($con , $query);

				if(mysqli_num_rows($query_run)>0)
				{
					echo ' <script type="text/javascript"> alert("User already Exists, Try with Different name") </script>';
				}
				else
				{
					$query= "insert into users values('$name' ,'$email' ,'$password' ,'$phonenumber' , '$address') ";
					$query_run = mysqli_query($con ,$query);

					if($query_run) 
					{
						echo ' <script type="text/javascript"> alert("User Registered Successfully") </script>';
						$_SESSION['name']=$name;
						header('location:homepage.php');
					} 
					else 
					{
						echo ' <script type="text/javascript"> alert("Erorr Registering a User") </script>';
					}
				}
			}
			else 
			{
				echo ' <script type="text/javascript"> alert("Check your Confirmation Password") </script>';
			}
		}

	?>


	</div>

</body>
</html>