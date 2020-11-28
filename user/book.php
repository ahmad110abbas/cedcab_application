<?php 
	session_start();
	include 'config.php';

	$pickup=$_POST['pickup'];
	$drop=$_POST['drop'];
	$cabtype=$_POST['cabtype'];
	$luggage=$_POST['luggage'];
	$res=$_POST['res'];
	$date=date('Y-m-d');
	$status=1;


	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT name, distance FROM location WHERE is_available='1'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    $distance[$row['name']]=$row['distance'];
	  }
	    // echo "<pre>";
	    // print_r($distance);
	    // echo "</pre>";
	} else {
	  echo "0 results";
	}

	$dis= abs($distance[$drop] - $distance[$pickup]);

	$sql = "INSERT INTO ride (ride_date, pickup, destination, total_distance, luggage, total_fare, status,customer_user_id) VALUES ('".$date."', '".$pickup."' , '".$drop."','".$dis."','".$luggage."','".$res."','".$status."','".$_SESSION['userdata']['user_id']."')";
			if ($conn->query($sql)===true) {
			echo "New Record Added Successfully";
		}else{
			print_r($conn->error);
		}
		
		$conn->close();

 ?>




 