<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #ecf0f1">

	<div class="main-wrapper">
		<center><h2>Login</h2></center>
	

	<form class="main-form" action="index.php" method="post">

		<label class="label-txt">Email</label>
		<input type="email" name="email" placeholder="Enter your Email" class="input-form"><br>

		<label class="label-txt">Password</label>
		<input type="password" name="password" placeholder="Enter your Password" class="input-form"><br>

		<center>
			<button class="login-btn" name="login_btn" type="submit">Login</button>
			<a href="register.php"><input  type="button" class="register-btn" value="Register"></a>
		</center>
		
	</form>

	<?php

	if(isset($_POST['login_btn']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query= " select * from users WHERE email='$email' AND password='$password' ";
		$query_run= mysqli_query($con , $query);

		if(mysqli_num_rows($query_run)> 0) 
		{
			 while($row = $query_run->fetch_assoc()) {                    
   			 $name=$row['name'];
   			 $_SESSION['name'] = $name;
			 header('location:homepage.php');
   			}

			
		}
		else
		{
			echo ' <script type="text/javascript"> alert("Invalid Email or Password") </script>';
		}
	}

	?>

	</div>

	
</body>
</html>