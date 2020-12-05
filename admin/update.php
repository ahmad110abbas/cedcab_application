<?php
	include 'config.php';
	if (isset($_POST['v'])) {
		$ride_id=$_POST['v'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// $sql = "UPDATE `ride` SET `status` = '2' WHERE `ride_id` = ".$ride_id."";
		$sql="DELETE FROM `ride` WHERE `ride`.`ride_id` = ".$ride_id."";
		$result = $conn->query($sql);
		
	}
	if (isset($_POST['vl'])) {
		$ride_id=$_POST['vl'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE `ride` SET `status` = '0' WHERE `ride_id` = ".$ride_id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['va'])) {
		$user_id=$_POST['va'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE `user` SET `isblock` = '0' WHERE `user`.`user_id`= ".$user_id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['loc'])) {
		$id=$_POST['loc'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="DELETE FROM `location` WHERE `location`.`location_id`= ".$id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['l'])) {
		$id=$_POST['l'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="UPDATE `location` SET `is_available` = '1' WHERE `location`.`location_id` = ".$id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['lo'])) {
		$id=$_POST['lo'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="UPDATE `location` SET `is_available` = '0' WHERE `location`.`location_id` = ".$id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['d'])) {
		$id=$_POST['d'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="DELETE FROM `ride` WHERE `ride`.`ride_id` = ".$id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['b'])) {
		$id=$_POST['b'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="UPDATE `user` SET `isblock` = '0' WHERE `user`.`user_id` = ".$id."";
		$result = $conn->query($sql);
	}
	if (isset($_POST['u'])) {
		$id=$_POST['u'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="UPDATE `user` SET `isblock` = '1' WHERE `user`.`user_id` = ".$id."";
		$result = $conn->query($sql);
	}
?>


