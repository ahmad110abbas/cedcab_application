<?php 
	include 'config.php';
	$error='';
	if (isset($_POST['register'])) {
		$username=ltrim(isset($_POST['user_name'])?$_POST['user_name']:'');
		$name=ltrim(isset($_POST['name'])?$_POST['name']:'');
		$mob_number=isset($_POST['number'])?$_POST['number']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		$repassword=isset($_POST['repassword'])?$_POST['repassword']:'';
		$date=date('Y-m-d');
		$block=true;
		$admin=0;

	if (($password!=$repassword) || ($username=="") || ($name=="")) {
		$error="password doesn't match or invalid username";
		echo "<p>",$error,"</p>";
	}else{
		$sql = "INSERT INTO user (user_name, name, dateofsignup, mobile, isblock, password, is_admin) VALUES ('".$username."', '".$name."' , '".$date."','".$mob_number."','".$block."','".$password."','".$admin."')";
		if ($conn->query($sql)===true) {
			echo "New Record Added Successfully";
		}else{
			print_r($conn->error);
		}
		
		$conn->close();
	}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CedCab</title>
	<link rel="stylesheet" type="text/css" href="style_reg.css">
</head>
<body>
<form method="post" action="registration.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="user_name"><b>User_Name</b></label>
    <input type="text" placeholder="Enter User Name" name="user_name" id="user_name" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>

    <label for="number"><b>Number</b></label>
    <input type="text" placeholder="Enter Mobile Number" name="number" id="number" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repassword" id="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>