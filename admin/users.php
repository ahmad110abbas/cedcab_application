<?php 
include 'config.php';
$pending1=array();
$complete1=array();
        $sql= "SELECT COUNT(user_id) AS Num FROM user WHERE isblock='1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($pending=$result->fetch_assoc()) {
              array_push($pending1, $pending);
            }
             $showp=$pending1[0]['Num'];
        }else{
            echo "Invalid Username or Password";
        }
        $sql= "SELECT COUNT(user_id) AS Num1 FROM user WHERE isblock='0'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($complete=$result->fetch_assoc()) {
              array_push($complete1, $complete);
            }
             $showc=$complete1[0]['Num1'];
        }else{
            echo "Invalid Username or Password";
        }
 ?>
<!doctype html>
<html lang="en">
<head>
    <style>
        body {
          font-family: "Lato", sans-serif;
      }
      .sidenav {
          height: 100%;
          width: 160px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          padding-top: 20px;
      }

      .sidenav a {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
      }

      .sidenav a:hover {
          color: #f1f1f1;
      }

      .main {
          margin-top: 50px;
          margin-left: 160px; 
          font-size: 28px; 
          padding: 0px 10px;
      }

      @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
      }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Admin</title>
</head>
<body>
    <div class="sidenav">
      <a href="index.php" active>Rides</a>
      <a href="users.php">Users</a>
      <a href="location.php">Locations</a>
      <a href="account.php">Account</a>
      <a href="http://localhost/task/cedcab/user/index.php">LogOut</a>
  </div>

  <div class="main">
    <div class="container">
      <div class="row">
        <div class="col-sm">
  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
      <div class="card-header"><a href="moreinfo.php?user=1">More Info</a></div>
      <div class="card-body">
        <h5 class="card-title">Pending User Request</h5>
        <p class="card-text"><?php echo $showp?></p>
    </div>
</div>
    </div>
    <div class="col-sm">
      <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header"><a href="moreinfo.php?user=2">More Info</a></div>
          <div class="card-body">
            <h5 class="card-title">All Users</h5>
            <p class="card-text"><?php echo $showp+$showc?></p>
        </div>
    </div>
</div>
<div class="col-sm">
  <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
      <div class="card-header"><a href="moreinfo.php?user=0">More Info</a></div>
      <div class="card-body">
        <h5 class="card-title">Approved User Request</h5>
        <p class="card-text"><?php echo $showc?></p>
    </div>
</div>
</div>
</div>
</div>


</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>