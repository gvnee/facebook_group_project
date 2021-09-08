<?php 
session_start();

require "autoload.php";

$user_data = check_login($con);

$query = "select * from fbgroups";

$result = mysqli_query($con, $query);

$kaomoji = array(

	"⊂(◉‿◉)つ","(ㆆ _ ㆆ)","☜(⌒▽⌒)☞","( ╥﹏╥) ノシ","⤜(ⱺ ʖ̯ⱺ)⤏",
	 "(⌐■_■)","(= ФェФ=)","ʕノ•ᴥ•ʔノ ︵ ┻━┻",
	 "(•_•) ( •_•)>⌐■-■ (⌐■_■)","ԅ(≖‿≖ԅ)","(｡◕‿‿◕｡)",
	 "ᕕ(⌐■_■)ᕗ ♪♬","/|\ ^._.^ /|\ ","☉ ‿ ⚆","(◕ᴥ◕ʋ)",
	 "ヽ(｀Д´)ﾉ","(≧︿≦)","(҂◡_◡) ᕤ","(ﾉ◕ヮ◕)ﾉ*:・ﾟ✧",
	 "(⌐■_■)︻╦╤─ (╥﹏╥)","ψ(｀∇´)ψ","(╯°□°)╯︵ ʞooqǝɔɐɟ",
	 "(ง •̀_•́)ง","ᕙ(`▽´)ᕗ","┬─┬ ︵ /(.□. \）","(✿◠‿◠)",
	 "(╯°□°)╯︵ ┻━┻ ︵ ╯(°□° ╯)","༼ つ ◕_◕ ༽つ",
	 "(ﾉ☉ヮ⚆)ﾉ ⌒*:･ﾟ✧","༼つಠ益ಠ༽つ ─=≡ΣO))","	ᕕ( ᐛ )ᕗ","(づ｡◕‿‿◕｡)づ",
	 "	._.)/\(._.","ଘ(੭*ˊᵕˋ)੭* ̀ˋ ɪɴᴛᴇʀɴᴇᴛ","≧◡≦","(づ ￣ ³￣)づ","~\(≧▽≦)/~",
	 "_(:3」∠)_","( ͡° ͜ʖ ͡°)","	┬┴┬┴┤( ͡° ͜ʖ├┬┴┬┴","L(° O °L)",
	 "ヽ(｀Д´)⊃━☆ﾟ. * ･ ｡ﾟ,","(/¯◡ ‿ ◡)/¯ ~ ┻━┻","~=[,,_,,]:3","( º﹃º )",
	 "@^@","( º﹃º )","( •_•)O*¯`·.¸.·´¯`°Q(•_• )","¯\_(ツ)_/¯",
	 "┬┴┬┴┤(･_├┬┴┬┴","┬──┬ ノ(ò_óノ)","ლ(`◉◞౪◟◉‵ლ)","[¬º-°]¬","ʕ-ᴥ-ʔ",
	 "•ᴗ•","ฅ^•ﻌ•^ฅ","(ｏ・_・)ノ”(ᴗ_ ᴗ。)","┐(￣ヮ￣)┌","(=ↀωↀ=)",
	 "̿̿ ̿̿ ̿'̿'\̵͇̿̿\з= ( ▀ ͜͞ʖ▀) =ε/̵͇̿̿/’̿’̿ ̿ ̿̿ ̿̿",
	 "(◣_◢)"

);

echo "<a href='../../public/index.php'>home page</a>";

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
	<style>

	@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
	@import 'https://fonts.googleapis.com/css?family=Montserrat:300,400,700';
	@import "compass/css3";
		
	body{
		font-family: Montserrat, monospace, sans-serif;
		background-color: #eee;
		color: #444;
		padding: 0 2em;
		-webkit-font-smoothing: antialiased;
 		text-rendering: optimizeLegibility;
 		/*background-image:url("https://1.bp.blogspot.com/-Fo3iRt97ZXY/XvSG4EMwi0I/AAAAAAAAVEo/mrApRTcVVRk1m-fX9K-ffNwRUXlHUocdwCLcBGAsYHQ/s1600/h.jpg");*/
 		background-color: #073035;
	}

	.c_table{
		margin: 1em 0;
		width: 100%;
		min-width: 300px;
		border-collapse: collapse;
		background-color: #34495E;
		border-radius: .4em;
		color: #fff;
		padding: 1em !important;
		font-weight: bold;
	}

	tr{
		border-color: lighten(#34495E, 10%);
/*		border-top: 1px solid #ddd;
		border-bottom: 1px solid #ddd;*/
	}



	th, td:before {
    	color: #dd5;
  	}

	th{
		height: 50px;
		/*padding: 10px;*/
		margin: .5em 1em;
		/*border-bottom: 1px solid #ddd;*/
		/*background-color: #C9C9C9;*/
		color: #white;
		padding: 1em !important; 
	}
	/*tr:nth-child(odd) {background-color: #A3A3A3;}*/
	td{
		text-align: center;
		margin: .5em 1em;
		padding: 1em !important;
		/*padding: 10px;*/
		/*border-bottom: 1px solid #419D78;*/

	}
	td:first-child {
      padding-top: .5em;
    }
    td:last-child {
      padding-bottom: .5em;
    }
    td:before{
    	/*content: attr(data-th)": ";
    	font-weight: bold;
    	width: 6.5em;
    	display: inline-block;*/
    }

	a{
		text-decoration: none;
	}
	a:link           { color: #dd5 }
	a:visited        { color: #dd5 }
	a:hover, a:focus { color: #0c0 }
	a:active         { color: #ccc }

	.search-container{
		float: right;
	}

	</style>
</head>
<body>
	<div class="search-container">
    <form action="search.php" method="POST">
	<input type="text" name="query" />
	<input type="submit" value="Search" />
	</form>
  </div>
</body>
</html>