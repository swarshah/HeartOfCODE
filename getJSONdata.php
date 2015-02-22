<?php
include 'connection.php';
if(isset($_GET['province'])){
	$province = $_GET["province"];
	$query="SELECT * FROM population where p_id = (SELECT p_id from province where name = '$province');";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	else{
		$array = array();
		while ($row = mysql_fetch_assoc($result)) {
			$tmpArray = array(
				'Age Group' => $row['agegroup'],
				'Value' => $row['value']
			);
			array_push($array,$tmpArray);
			/* echo "Age group: ".$row['agegroup'].'<br>';
			echo "Value: ".$row['value'].'<br>'; */
		}
		echo json_encode($array);
	}
}
else{
	echo "Not enough arguments";
}
mysql_close($link);
?>