<?php 
session_start();

require "autoload.php";

$user_data = check_login($con);

 $query = "select * from fbgroups";

// $result = mysqli_query($con, $query);

$kaomoji = array("⊂(◉‿◉)つ","(ㆆ _ ㆆ)","☜(⌒▽⌒)☞","( ╥﹏╥) ノシ","⤜(ⱺ ʖ̯ⱺ)⤏","(⌐■_■)","(= ФェФ=)","ʕノ•ᴥ•ʔノ ︵ ┻━┻","(•_•) ( •_•)>⌐■-■ (⌐■_■)","ԅ(≖‿≖ԅ)","(｡◕‿‿◕｡)","ᕕ(⌐■_■)ᕗ ♪♬","/|\ ^._.^ /|\ ","☉ ‿ ⚆","(◕ᴥ◕ʋ)","ヽ(｀Д´)ﾉ","(≧︿≦)","(҂◡_◡) ᕤ","(ﾉ◕ヮ◕)ﾉ*:・ﾟ✧","(⌐■_■)︻╦╤─ (╥﹏╥)","ψ(｀∇´)ψ","(╯°□°)╯︵ ʞooqǝɔɐɟ","(ง •̀_•́)ง","ᕙ(`▽´)ᕗ","┬─┬ ︵ /(.□. \）","(✿◠‿◠)","༼ つ ◕_◕ ༽つ","(ﾉ☉ヮ⚆)ﾉ ⌒*:･ﾟ✧","༼つಠ益ಠ༽つ ─=≡ΣO))","	ᕕ( ᐛ )ᕗ","(づ｡◕‿‿◕｡)づ","	._.)/\(._.","ଘ(੭*ˊᵕˋ)੭* ̀ˋ ɪɴᴛᴇʀɴᴇᴛ","≧◡≦","(づ ￣ ³￣)づ","~\(≧▽≦)/~","_(:3」∠)_","( ͡° ͜ʖ ͡°)","	┬┴┬┴┤( ͡° ͜ʖ├┬┴┬┴","L(° O °L)","ヽ(｀Д´)⊃━☆ﾟ. * ･ ｡ﾟ,","(/¯◡ ‿ ◡)/¯ ~ ┻━┻","~=[,,_,,]:3","( º﹃º )","@^@","( º﹃º )","( •_•)O*¯`·.¸.·´¯`°Q(•_• )","¯\_(ツ)_/¯","┬──┬ ノ(ò_óノ)","ლ(`◉◞౪◟◉‵ლ)","[¬º-°]¬","ʕ-ᴥ-ʔ","•ᴗ•","ฅ^•ﻌ•^ฅ","(ｏ・_・)ノ”(ᴗ_ ᴗ。)","┐(￣ヮ￣)┌","(=ↀωↀ=)","(◣_◢)");

echo "<a href='../../public/index.php'>home page</a>";
echo "<link rel='stylesheet' type='text/css' href='style/table.css'>";

// echo "<div class='search-container'>";
// echo "<form method='POST'>";
// echo "<input class='searchInput' placeholder='Search' type='text' name='query' />";
// echo "<button class='searchButton' type='submit' value='search'><i class='fa fa-search'></i></button>";
// echo "</form>";
// echo "</div>";

echo "<table class='c_table'>";
			echo "<tr>";
			echo "<th>Хичээлийн код</th>";
			echo "<th>Хичээлийн нэр</th>";
			echo "<th>Багш</th>";
			echo "<th>Холбоос</th>";
			echo "<th>Нэмсэн хэрэглэгч</th>";
			echo "<th>Нэмэгдсэн огноо</th>";
			echo "</tr>";
			echo "<tr>";

if($_SERVER['REQUEST_METHOD']=='POST'){
	$query = $_POST['query'];
	$min_length = 3;
	if(strlen($query)>=$min_length){
		$query = htmlspecialchars($query);
		$query = mysqli_real_escape_string($con, $query);
		$result = mysqli_query(
		$con, "SELECT * FROM fbgroups 
		WHERE teacher LIKE '%".$query."%' OR hich_code LIKE '%".$query."%' 
		OR hich_ner LIKE '%".$query."%'");

		if(mysqli_num_rows($result)==0){
			$query = "select * from fbgroups";
			$result = mysqli_query($con, $query);
		}
	}
	else{
		echo "minimum length is ". $min_length;
		$query = "select * from fbgroups";
		$result = mysqli_query($con, $query);
	}
}
else{ $result = mysqli_query($con, $query);}

while ($row = mysqli_fetch_row($result)){
	
	$k = array_rand($kaomoji);
	$v = $kaomoji[$k];

	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	echo "<td>$row[3]</td>";
	echo "<td><a href='$row[1]' target='_blank' rel='noopener noreferrer'>$v</td>";
	echo "<td>$row[6]</td>";
	echo "<td>$row[2]</td>";
	
	echo "</tr><tr>";
}

echo "</tr>";
echo "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>table</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="style/table.css"> -->
</head>
<body>
	<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form method = "POST">
      <input type="text" placeholder="Search.." name="query">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
</body>
</html>