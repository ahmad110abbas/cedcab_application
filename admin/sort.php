
 <?php
	include 'config.php';
	if (isset($_POST['fare'])) {
		$ride_id=$_POST['v'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// $sql = "UPDATE `ride` SET `status` = '2' WHERE `ride_id` = ".$ride_id."";
		$sql="SELECT * FROM ride ORDER BY total_fare";
		$result = $conn->query($sql);
	}
	// if (isset($_POST['vl'])) {
	// 	$ride_id=$_POST['vl'];
	// 	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	// 	if ($conn->connect_error) {
	// 		die("Connection failed: " . $conn->connect_error);
	// 	}
	// 	$sql = "UPDATE `ride` SET `status` = '2' WHERE `ride_id` = ".$ride_id."";
	// 	$result = $conn->query($sql);
	// }
?>