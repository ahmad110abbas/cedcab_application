<?php 
// $d=$_POST['d'];
	include 'config.php';
	if (isset($_POST['d'])) {
		$ride_id=$_POST['d'];
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql="DELETE FROM `ride` WHERE `ride`.`ride_id` = ".$ride_id."";
		$result = $conn->query($sql);
	}
 ?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<title>CedCab</title>
	<section class="">
		<nav class="navbar navbar-expand-lg navbar-light py-0"style="background-color: #fabd06;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="#"><p id="logo">Ced<span id="clr">Cab</span></p></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="bookcab.php"><?php echo "Welcome "; if (isset($_SESSION['userdata']['username'])) {
							print_r($_SESSION['userdata']['username']);
						}; ?> <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Rides
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="pride.php">Pending Rides</a>
							<a class="dropdown-item" href="crides.php">Completed Rides</a>
							<a class="dropdown-item" href="aride.php">All Rides</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="update.php">Update Info</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="invoice.php">Invoice</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout=1">LogOut</a>
					</li>
					<li class="nav-item">
						<?php 
							echo '<a class="nav-link" href="">Total Expense='.$expense['faresum'].'</a>';
						 ?>
					</li>
				</ul>
			</div>
		</nav>
	</section>