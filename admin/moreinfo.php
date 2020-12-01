<?php 
session_start();
include 'config.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// if (isset($_POST['fare'])) {
// 	print_r($_GET);
// 	print_r($_POST);
// 	die();
// }
function display_rec($result){
	echo "<thead>";
	echo "<tr>";
	echo '<th scope="col">#</th>';
	echo '<th scope="col">Date</th>';
	echo '<th scope="col">Pickup</th>';
	echo '<th scope="col">Destination</th>';
	echo '<th scope="col">Distance</th>';
	echo '<th scope="col">Luggage Cost</th>';
	echo '<th scope="col">Total Fare</th>';
	echo '<th scope="col">Action</th>';
	echo '</tr>';
	echo '</thead>';
	$count=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo '<th scope="row">',$count,'</th>';
			echo '<td>',$row["ride_date"],'</td>';
			echo '<td>',$row["pickup"],'</td>';
			echo '<td>',$row["destination"],'</td>';
			echo '<td>',$row["total_distance"],'</td>';
			echo '<td>',$row["luggage"],'</td>';
			echo '<td>',$row["total_fare"],'</td>';
			echo '<td><button type="button" class="btn btn-danger" onclick="cncl('.$row["ride_id"].')">Cancel</button><button type="button" class="btn btn-warning" onclick="allow('.$row["ride_id"].')">Allow</button></td>';
			echo "<tr>";
			$count=$count+1;
		}
	} else {
		echo "0 results";
	}
}

function display_user($result){
	echo "<thead>";
	echo "<tr>";
	echo '<th scope="col">#</th>';
	echo '<th scope="col">User Name</th>';
	echo '<th scope="col">Name</th>';
	echo '<th scope="col">Date Of SignUp</th>';
	echo '<th scope="col">Mobile</th>';
	echo '<th scope="col">Action</th>';
	echo '</tr>';
	echo '</thead>';
	$count=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo '<th scope="row">',$count,'</th>';
			echo '<td>',$row["user_name"],'</td>';
			echo '<td>',$row["name"],'</td>';
			echo '<td>',$row["dateofsignup"],'</td>';
			echo '<td>',$row["mobile"],'</td>';
			echo '<td><button type="button" class="btn btn-warning">Allow</button></td>';
			echo "<tr>";
			$count=$count+1;
		}
	} else {
		echo "0 results";
	}
}

?>

<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
	</style>
	<title>CedCab</title>
</head>
<body>
	<form action="" method="POST">
		<?php echo '<input type="text" name="data" value="" hidden>';  ?>
		<input type="submit" name="fare" value="sortbyfare">
	</form>
	<form action="" method="POST">
		<?php echo '<input type="text" name="data" value="" hidden>';  ?>
		<input type="submit" name="date" value="sortbydate">
	</form>
	<table class="table" id="myTable">

		<tbody>
			<?php 
			if (isset($_GET['id']) && ($_GET['id']==1) && is_null($_POST['fare']) && is_null($_POST['date'])) {
				$sql = "SELECT * FROM ride WHERE status='".$_GET['id']."'";
				$result = $conn->query($sql);
				display_rec($result);
			}
			if (isset($_GET['id']) && ($_GET['id']==3)) {
				$sql = "SELECT * FROM ride";
				$result = $conn->query($sql);
				display_rec($result);
			}
			if (isset($_GET['id']) && ($_GET['id']==2)) {
				$sql = "SELECT * FROM ride WHERE status='".$_GET['id']."'";
				$result = $conn->query($sql);
				display_rec($result);
			}
			if (isset($_GET['id']) && ($_GET['id']==0)) {
				$sql = "SELECT * FROM ride WHERE status='".$_GET['id']."'";
				$result = $conn->query($sql);
				display_rec($result);
			}
			if (isset($_GET['user']) && ($_GET['user']==1)) {
				$sql = "SELECT * FROM user WHERE isblock='".$_GET['user']."'";
				$result = $conn->query($sql);
				display_user($result);
			}
			if (isset($_GET['user']) && ($_GET['user']==2)) {
				$sql = "SELECT * FROM user";
				$result = $conn->query($sql);
				display_user($result);
			}
			if (isset($_GET['user']) && ($_GET['user']==0)) {
				$sql = "SELECT * FROM user WHERE isblock='".$_GET['user']."'";
				$result = $conn->query($sql);
				display_user($result);
			}
			if (isset($_POST['fare']) && ($_GET['id']==1)) {
				$sql = "SELECT * FROM ride WHERE status='".$_GET['id']."' ORDER BY total_fare DESC";
				$result = $conn->query($sql);
				display_rec($result);
			}
			if (isset($_POST['date']) && ($_GET['id']==1)) {
				$sql="SELECT * FROM `ride` WHERE status='".$_GET['id']."' ORDER BY `ride`.`ride_date` DESC";
				// $sql = "SELECT * FROM ride WHERE status='".$_GET['id']."' ORDER BY date DESC";
				$result = $conn->query($sql);
				display_rec($result);
			}
			?>
		</tbody>
	</table>

</body>
</html>
<script type="text/javascript">
	
	function allow(v){
		console.log(v);
		location.reload();
		$.ajax({
			url:'update.php',
			type:'POST',
			data:{v:v},
			success:function(result){
				console.log(result);
			},
			error: function(){
				alert("error");
			}
		});
	}
	function cncl(vl){
		console.log(vl);
		location.reload();
		$.ajax({
			url:'update.php',
			type:'POST',
			data:{vl:vl},
			success:function(result){
				console.log(result);
			},
			error: function(){
				alert("error");
			}
		});
	}
</script>

<!-- select * from tbl_ride where ride_date>DATE_SUB(now(),1 WEEK INTERVAL) and STATUS=1 OR ANY CONDITION ACCORDING TO YOU -->