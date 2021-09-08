<?php 
session_start();
	
	require "../private/autoload.php";
	$Error = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username_pattern = "/^[A-Za-z][A-Za-z0-9]{4,29}$/";

		if(!preg_match($username_pattern, $username)){
			$Error = "username must be 5-30 long and only include a-z, A-Z, 0-9";
		}

		if(!empty($username) && !empty($password) && !is_numeric($username) &&$Error == ""){

			//save to database
			$user_id = random_id(20);
			$query = "insert into users (user_id,username,password) 
					 values 
					 ('$user_id','$username','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}
		else{

			echo "enter valid information!";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
</head>
<body>
	<div id="box">
		<form method="post">

			<div><?php 
				if(isset($Error) && $Error != ""){
					echo $Error;
				}

			?></div>

			<h1>Sign up</h1>
			<input type="text" name="username" required><br><br>
			<input type="password" name="password" required><br><br>

			<input type="submit" value="Signup">

			<a href="login.php">Login</a>
		</form>
	</div>
</body>
</html>