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
		$query = htmlspecialchars($query);
		$query = mysqli_real_escape_string($con, $query);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add group</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/addgroup.css">
</head>
<body>
	<div class="topline"></div>
	<div class="topnav">
		<ul>
			<li><a href="index.php">Нүүр</a></li>
			<li><a href="../private/table3.php">fb groups</a></li>
			<li><a href="addgroup.php">Group нэмэх</a></li>
			<li style="float:right"><a href="logout.php" class="logout">Log out</a></li>
		</ul>
	</div>

	<div class="container">

		<form method="post" class="addform">
			<label class="la1">Хичээлийн код</label>
			<input type="text" name="hich_code" required class="in1" autocomplete="off" placeholder="A.BC420">
			<p class="error1 error"></p>
			<p class="desc1"> Жишээ: F.CS101, F.CS102, S.SS101, f.it312, f.ee312</p>
			<label class="la2">Хичээлийн нэр</label>
			<input type="text" name="hich_ner" required class="in2" autocomplete="off">
			<p class="error2 error"></p>
			<p class="desc2">Хайхад амар болгох үүднээс хичээлийн нэрийг кирил үсгээр үг нэмж хасалгүй оруулна</p>
			<label class="la3">Багшийн нэр</label>
			<input type="text" name="teacher" required class="in3" autocomplete="off">
			<p class="error3 error"></p>
			<p class="desc3">кирил үсгээр бичнэ(Овгийн эхний үсэг байж болно)</p>
			<label class="la4">facebook group-ын холбоос</label>
			<input type="text" name="group_link" required class="in4" autocomplete="off" placeholder="https://www.facebook.com/groups/69420466942046">
			<p class="error4 error"></p>
			<p class="desc4">холбоосыг бүтнээр нь оруулна</p>
			<p class="submit1"></p>
			<input type="submit" value="нэмэх" class="submit2">
		</form>
	</div>
</body>
</html>