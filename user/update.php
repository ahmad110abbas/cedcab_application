<?php 
session_start();
// print_r($_SESSION['userdata']['user_id']);
include 'config.php';
$sql= "SELECT * FROM user WHERE user_id='".$_SESSION['userdata']['user_id']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row=$result->fetch_assoc()) {
    $uname=$row['user_name'];
    $name1=$row['name'];
    $mob=$row['mobile'];
    $pass=$row['password'];
    // print_r($row);
  }
}else{
  echo "Error";
}
  $error='';
  if (isset($_POST['register'])) {
    $username=isset($_POST['user_name'])?$_POST['user_name']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $mob_number=isset($_POST['number'])?$_POST['number']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';

    $sql="UPDATE `user` SET `user_name` = '".$username."', `name` = '".$name."', `mobile` = '".$mob_number."', `password` = '".$password."' WHERE `user`.`user_id` = ".$_SESSION['userdata']['user_id']."";
    if ($conn->query($sql)===true) {
      echo "Record Updated Successfully";
      header('Location: http://localhost/task/cedcab/user/login.php');
    }else{
      print_r($conn->error);
    }
    
    $conn->close();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>CedCab</title>
	<link rel="stylesheet" type="text/css" href="style_reg.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <a class="nav-link" href="index.php?logout=1">LogOut</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
<form method="post" action="update.php">
  <div class="container">
    <h1>Update Info</h1>
    <p>Please fill in this form to update your account.</p>
    <hr>

    <label for="user_name"><b>User_Name</b></label>
    <input type="text" placeholder="Enter User Name" name="user_name" id="user_name" value=<?php echo '"';print_r($uname);echo '"'; ?> required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value=<?php echo '"';print_r($name1);echo '"'; ?> required>

    <label for="number"><b>Number</b></label>
    <input type="text" placeholder="Enter Mobile Number" name="number" id="number" value=<?php echo '"';print_r($mob);echo '"'; ?> required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" value=<?php echo '"';print_r($pass);echo '"'; ?> required>

    <hr>

    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>
  
  <div class="container signin">
    <p>Sign in after updation <a href="index.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>