<?php 
include 'config.php';
if (isset($_POST['submit'])) {
  $error='';
  if (isset($_POST['submit'])) {
    $loc=isset($_POST['loc'])?$_POST['loc']:'';
    $dis=isset($_POST['dis'])?$_POST['dis']:'';
    $sql = "INSERT INTO `location` (`location_id`, `name`, `distance`, `is_available`) VALUES (NULL, '".$_POST['loc']."', '".$_POST['dis']."', '1')";
    if ($conn->query($sql)===true) {
      // echo "New Record Added Successfully";
    }else{
      print_r($conn->error);
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      margin-top: 10px;
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
    <a href="index.php">Back To Home</a>
    <section>
      <form action="location.php" method="POST">
        <div class="form-group">
          <label for="newlocation">New Location</label>
          <input type="text" name="loc" class="form-control" id="newlocation" aria-describedby="emailHelp" placeholder="Enter new location">
        </div>
        <div class="form-group">
          <label for="distance">Distance From Charbagh</label>
          <input type="number" name="dis" class="form-control" id="distance" placeholder="distance">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
      </form>
    </section>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Pickup</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $count=0;
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM location";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<th scope="row">',$count,'</th>';
            echo '<td>',$row["name"],'</td>';
            echo '<td>',$row["distance"],'</td>';
            echo '<td><button type="button" class="btn btn-danger" onclick="dlocation('.$row['location_id'].')">Delete</button></td>';
            echo "<tr>";
            $count=$count+1;
          }
        } else {
          echo "0 results";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<script type="text/javascript">
  function dlocation(loc){
    console.log(loc);
    location.reload();
    $.ajax({
      url:'update.php',
      type:'POST',
      data:{loc:loc},
      success:function(result){
        console.log(result);
      },
      error: function(){
        alert("error");
      }
    });
  }
</script>