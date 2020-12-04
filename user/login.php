<?php 
session_start();
include 'config.ini.php';
if (isset($_GET['logout'])) {
    unset($_SESSION['p']);
    unset($_SESSION['d']);
    unset($_SESSION['c']);
    unset($_SESSION['l']);
    session_unset();
    session_destroy();
    header('Location: index.php');
}
// if (isset($_POST['login'])) {
//     $username=isset($_POST['username'])?$_POST['username']:'';
//     $password=isset($_POST['password'])?$_POST['password']:'';
//     if ($username=="admin" && $password=="Password123$") {
//         header('Location: http://localhost/task/cedcab/admin/index.php');
//     }else{
//     $sql= "SELECT * FROM user WHERE user_name='".$username."' AND password='".$password."' AND isblock='0'";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         while ($row=$result->fetch_assoc()) {
//             $_SESSION['userdata']=array('username'=>$row['user_name'],'user_id'=>$row['user_id']);
//             header('Location:http://localhost/task/cedcab/user/bookcab.php');
//         }
//     }else{
//         echo "Invalid Username or Password or Request Pending";
//     }
// }
// }



if (isset($_POST['login'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    if ($username=="admin" && $password=="Password123$") {
        $_SESSION['admindata']="admin";
        header('Location: http://localhost/task/cedcab/admin/index.php');
    }else{
        $obj=new database();
        $sql=$obj->login($username, $password);
        // print_r($sql);
        // die();
        // $row=$sql->fetch_assoc();
        // print_r($row['user_id']);
        // die();
    if ($sql->num_rows > 0) {
        echo "1";
        while ($row=$sql->fetch_assoc()) {
            // print_r($row);
            // die();
            $_SESSION['userdata']=array('username'=>$row['user_name'],'user_id'=>$row['user_id']);
            header('Location:http://localhost/task/cedcab/user/bookcab.php');
        }
    }else{
        echo "Invalid Username or Password or Request Pending";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CedCab</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center> <h1> User/Admin Login Form </h1> </center>   
    <form method="post" action="login.php">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit" name="login">Login</button>   
            <input type="checkbox" checked="checked"> Remember me   
            <button type="button" class="cancelbtn"> Cancel</button>   
            New User? <a href="registration.php"> Signup </a>   
        </div>   
    </form>
</body>
</html>