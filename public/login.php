<?php 
	
session_start();

require "../private/autoload.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

	//something was posted
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($username) && !empty($password) && !is_numeric($username)){

		//read from database
		$query = "select * from users where username= '$username' limit 1";

		$result = mysqli_query($con, $query);

		if($result){
			if($result && mysqli_num_rows($result) > 0){

				$user_data = mysqli_fetch_assoc($result);
				
				if($user_data['password'] === $password){

					$_SESSION['user_id'] = $user_data['user_id'];
					header("location: index.php");
					die;
				}	
			}
		}
		echo "enter valid information!";
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
	<title>Login</title>
</head>
<body>
	<div id="box">
		<form method="post">
			<h1>Login</h1>
			<input type="text" name="username" required><br><br>
			<input type="password" name="password" required><br><br>

			<input type="submit" value="Login">

			<a href="signup.php">Signup</a>
		</form>
	</div>
</body>
</html>