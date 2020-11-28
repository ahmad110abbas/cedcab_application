<?php

	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="cedcab";

	// Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
	}

	// class database{
	// 	public $con;
	// 	public function __construct(){
	// 		$this->con=mysqli_connect("localhost","root","","cedcab");
	// 		if ($this->con) {
	// 			echo "connected";
	// 		}else{
	// 			echo "not connected";
	// 		}
	// 	}
	// }
?>