


<!-- current facebook groups table page -->


<?php 
session_start();

require "autoload.php";

$query = "select * from fbgroups";

$error = '';

$kaomoji = array("⊂(◉‿◉)つ","(ㆆ _ ㆆ)","☜(⌒▽⌒)☞","( ╥﹏╥) ノシ","⤜(ⱺ ʖ̯ⱺ)⤏","(⌐■_■)","(= ФェФ=)","ʕノ•ᴥ•ʔノ ︵ ┻━┻","(•_•) ( •_•)>⌐■-■ (⌐■_■)","ԅ(≖‿≖ԅ)","(｡◕‿‿◕｡)","ᕕ(⌐■_■)ᕗ ♪♬","/|\ ^._.^ /|\ ","☉ ‿ ⚆","(◕ᴥ◕ʋ)","ヽ(｀Д´)ﾉ","(≧︿≦)","(҂◡_◡) ᕤ","(ﾉ◕ヮ◕)ﾉ*:・ﾟ✧","(⌐■_■)︻╦╤─ (╥﹏╥)","ψ(｀∇´)ψ","(╯°□°)╯︵ ʞooqǝɔɐɟ","(ง •̀_•́)ง","ᕙ(`▽´)ᕗ","┬─┬ ︵ /(.□. \）","(✿◠‿◠)","༼ つ ◕_◕ ༽つ","(ﾉ☉ヮ⚆)ﾉ ⌒*:･ﾟ✧","༼つಠ益ಠ༽つ ─=≡ΣO))","	ᕕ( ᐛ )ᕗ","(づ｡◕‿‿◕｡)づ","	._.)/\(._.","ଘ(੭*ˊᵕˋ)੭* ̀ˋ ɪɴᴛᴇʀɴᴇᴛ","≧◡≦","(づ ￣ ³￣)づ","~\(≧▽≦)/~","_(:3」∠)_","( ͡° ͜ʖ ͡°)","	┬┴┬┴┤( ͡° ͜ʖ├┬┴┬┴","L(° O °L)","ヽ(｀Д´)⊃━☆ﾟ. * ･ ｡ﾟ,","(/¯◡ ‿ ◡)/¯ ~ ┻━┻","~=[,,_,,]:3","( º﹃º )","@^@","( º﹃º )","( •_•)O*¯`·.¸.·´¯`°Q(•_• )","¯\_(ツ)_/¯","┬──┬ ノ(ò_óノ)","ლ(`◉◞౪◟◉‵ლ)","[¬º-°]¬","ʕ-ᴥ-ʔ","•ᴗ•","ฅ^•ﻌ•^ฅ","(ｏ・_・)ノ”(ᴗ_ ᴗ。)","┐(￣ヮ￣)┌","(=ↀωↀ=)","(◣_◢)","̿̿ ̿̿ ̿'̿'\̵͇̿̿\з= ( ▀ ͜͞ʖ▀) =ε/̵͇̿̿/’̿’̿ ̿ ̿̿ ̿̿");
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>table</title>
	<link rel='stylesheet' type='text/css' href='style/table3.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="topline" id="tl"></div>
	<div class="topnav">
  <a class="active" href="../public/index.php">Нүүр</a>
  <a href="table3.php">fb groups</a>
  <a href="../public/addgroup.php">Group нэмэх</a>
  <div class="search-container">
    <form method = "POST">
      <input type="text" placeholder="хайх..." name="query">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>



<table class='c_table'>
	<tr>
	<th>Хичээлийн код</th>
	<th>Хичээлийн нэр</th>
	<th>Багш</th>
	<th>Холбоос</th>
	<th>Нэмсэн хэрэглэгч</th>
	<!-- <th>Нэмэгдсэн огноо</th> -->
	</tr>
	<tr>

<?php

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
		$error = $min_length."-аас дээш тэмдэгт оруулна уу";
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
	// echo "<td>$row[2]</td>";
	
	echo "</tr><tr>";
}
?>

</tr>
</table>


</body>
</html>