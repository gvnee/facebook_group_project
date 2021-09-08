









<!-- for the purpose of testing search engine -->









<?php

require 'autoload.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>search results</title>
</head>
<body>
<?php
	$query = $_POST['query'];
	$min_length = 3;
	if(strlen($query)>=$min_length){
		$query=htmlspecialchars($query);
		$query=mysqli_real_escape_string($con, $query);
		$raw_results=mysqli_query($con, "SELECT * FROM fbgroups 
			WHERE teacher LIKE '%".$query."%' OR hich_code LIKE '%".$query."%' OR hich_ner LIKE '%".$query."%'");

		if(mysqli_num_rows($raw_results)>0){
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
			while($results = mysqli_fetch_row($raw_results)){
				echo "<td>$results[4]</td>";
				echo "<td>$results[5]</td>";
				echo "<td>$results[3]</td>";
				echo "<td><a href='$results[1]' target='_blank' rel='noopener noreferrer'>asdf</td>";
				echo "<td>$results[6]</td>";
				echo "<td>$results[2]</td>";

				echo "</tr><tr>";
			}
			echo "</tr>";
			echo "</table>";
		}
		else{
			echo "No results";
		}
	}
	else{
		echo "Minimum length is " . $min_length;
	}
?>
</body>
</html>