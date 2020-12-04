<?php 
	class database{
		public $con;
		public function __construct(){
			$this->con=mysqli_connect("localhost","root","","cedcab");
			if ($this->con) {
				// echo "connected";
			}else{
				echo "not connected";
			}
        }
        function login($username,$password){
        	$q="SELECT * FROM user WHERE user_name='".$username."' AND password='".$password."' AND isblock='0'";
            $result=mysqli_query($this->con,$q);
            return $result;
		}
	}


 ?>