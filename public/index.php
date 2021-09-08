<?php 
session_start();

	require "../private/autoload.php";
	$Error = '';

	$user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$hich_code = $_POST['hich_code'];
		$hich_ner = $_POST['hich_ner'];
		$teacher = $_POST['teacher'];
		$group_link = $_POST['group_link'];

		$link_pattern = "/^https:\/\/www.facebook.com\/groups\/([0-9/]){1,60}$/";
		$hich_code_pattern = "/([A-Z.]){3,5}[0-9]{3,5}/";

		if (!preg_match($link_pattern, group_link)){
			$Error = "username must be 5-30 long and only include a-z, A-Z, 0-9";
		}

		if(!empty($hich_code)&&!empty($hich_ner)&&!empty($teacher)&&!empty($group_link)){

			$submitter = $user_data['username'];
			$query = "insert into fbgroups
			(group_link, teacher, hich_code, hich_ner, submitter)
			values
			('$group_link','$teacher','$hich_code','$hich_ner','$submitter')";

			mysqli_query($con, $query);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
</head>
<body>
	<div class="topline"></div>
	<div class="topnav">
  <a href="index.php">Нүүр</a>
  <a href="../private/table3.php">fb groups</a>
  <a href="#">Group нэмэх</a>
</div>

	<a href="logout.php">Logout</a>

	<br>
	<p>hello, <?php echo $user_data['username']?></p>
	<form method="post">
		<label>hicheeliin code</label><br>
		<input type="text" name="hich_code" required><br>
		<label>hicheeliin ner</label><br>
		<input type="text" name="hich_ner" required><br>
		<label>bagshiin ner</label><br>
		<input type="text" name="teacher" required><br>
		<label>facebook group-iin link</label><br>
		<input type="text" name="group_link" required><br>
		<input type="submit" value="submit">
	</form>
</body>
</html>