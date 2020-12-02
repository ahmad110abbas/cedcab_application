<?php 
	include 'config.php';
	if (isset($_POST['d'])) {
		$d=$_POST['d'];
	}
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql =  "DELETE FROM `ride` WHERE `ride`.`ride_id` = '".$d."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	} else {
	  echo "0 results";
	}
 ?>