<?php 
session_start();
include 'config.php';
  if (isset($_GET['d'])) {
    $ride_id=$_GET['d'];
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="DELETE FROM `ride` WHERE `ride`.`ride_id` = ".$ride_id."";
    $result = $conn->query($sql);
    header('Location: pride.php');
  }
function display_ride($result){
  $count=0;
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo '<th scope="row">',$count,'</th>';
      echo '<td>',$row["ride_date"],'</td>';
      echo '<td>',$row["pickup"],'</td>';
      echo '<td>',$row["destination"],'</td>';
      echo '<td>',$row["total_distance"],'</td>';
      echo '<td>',$row["luggage"],'</td>';
      echo '<td>',$row["total_fare"],'</td>';
      echo '<td><a type="button" class="btn btn-danger" href="pride.php?d='.$row['ride_id'].'">Delete</a></td>';
      echo "<tr>";
      $count=$count+1;
    }
}
error_reporting(E_WARNING);
 ?>
<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>CedCab</title>
</head>
<body>
  
  <section class="">
    <nav class="navbar navbar-expand-lg navbar-light py-0"style="background-color: #fabd06;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"><p id="logo">Ced<span id="clr">Cab</span></p></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="bookcab.php"><?php echo "Welcome "; print_r($_SESSION['userdata']['username']); ?> <span class="sr-only">(current)</span></a>
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
            <a class="nav-link" href="login.php?logout=1">LogOut</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <section>
    <h3>Pending Rides</h3>
    <form action="pride.php" method="POST">
  <label >Sort:</label>
  <select name="by">
    <option value="fare">fare</option>
    <option value="distance">distance</option>
  </select>
  <select  name="order">
    <option value="ASC">ASC</option>
    <option value="DESC">DESC</option>
  </select>
  <input type="submit" value="sort">
</form>
  </section>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Pickup</th>
        <th scope="col">Destination</th>
        <th scope="col">Distance</th>
        <th scope="col">Luggage Cost</th>
        <th scope="col">Total Fare</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if (isset($_POST) && ($_POST['by']=="fare") && ($_POST['order']=="ASC")) {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM ride WHERE status='1' AND customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY total_fare ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          display_ride($result);
        }  else {
          echo "0 results";
        }
      }
      if (isset($_POST) && ($_POST['by']=="fare") && ($_POST['order']=="DESC")) {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM ride WHERE status='1' AND customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY total_fare DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          display_ride($result);
        }  else {
          echo "0 results";
        }
      }
      if (isset($_POST) && ($_POST['by']=="distance") && ($_POST['order']=="ASC")) {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM ride WHERE status='1' AND customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY total_distance ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          display_ride($result);
        }  else {
          echo "0 results";
        }
      }
      if (isset($_POST) && ($_POST['by']=="distance") && ($_POST['order']=="DESC")) {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM ride WHERE status='1' AND customer_user_id='".$_SESSION['userdata']['user_id']."' ORDER BY total_distance DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          display_ride($result);
        }  else {
          echo "0 results";
        }
      }else if (!isset($_POST['by'])) {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM ride WHERE status='1' AND customer_user_id='".$_SESSION['userdata']['user_id']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          display_ride($result);
        }  else {
          echo "0 results";
        }
      }
      
      ?>
    </tbody>
  </table>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



