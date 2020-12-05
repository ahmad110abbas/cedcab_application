<?php 
session_start();
if (isset($_SESSION['admindata'])) {
    unset($_SESSION['admindata']);
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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cabtype").change(function(){
				if ($(this).val()=="CedMicro") {
					$("#luggage").attr("disabled","enabled");
					$("#luggage").val("");
				}
				else if ($(this).val()!="CedMicro") {$("#luggage").removeAttr("disabled","enabled");}
			});
		});
	</script>
	<style type="text/css">
		html,body
		{
			min-width: 100%;
			width: 100%;
			height: 100%;
			margin: 0px;
			padding: 0px !important;
			overflow-x: hidden; 
		}
		.cover{
			width: 100%;
			position: relative;
			height: 600px;
		}
		.container{
			position: absolute;
			top:180px;
		}
		.img{
			opacity: 0.9;
			width: 100%;
			height: 750px;
		}
		#h{
			position: absolute;
			top: 30px;
			left: 20%;
			color: white;
		}
		@media screen and (min-width: 601px) {
			div#h {
				font-size: 40px;
			}
		}

		@media screen and (max-width: 600px) {
			div#h {
				font-size: 30px;
			}
		}
		#red{
			color: red!notimportant;
		}
		.form-h{
			font-size: 25px;
		}
		#para {

		}
		@media screen and (max-width: 375px) {
			.form-h {
				width: 60%;
				background-color:  #ffff33;
			}
		}
		@media screen and (min-width: 601px) {
			.form-h {
				width: 25%;
				background-color:  #ffff33;
			}
		}
		@media screen and (min-width: 1100px) {
			.form-h {
				margin-left: 5px;
				width: 25%;
				background-color:  #ffff33;
			}
		}
		@media screen and (min-width: 1100px) {
			div.frm {
				width: 40%;
			}
		}

		@media screen and (width: 375px) {
			div.cover {
				min-height: 800px;
			}
		}
		.opt{
			width: 40%;
		}


		.ui-select{width: 100%}
		select::-ms-expand {  display: none; }
		select{
			-webkit-appearance: none;
			appearance: none;
		}
		@-moz-document url-prefix(){
			.ui-select{border: 1px solid #CCC; border-radius: 4px; box-sizing: border-box; position: relative; overflow: hidden;}
			.ui-select select { width: 110%; background-position: right 30px center !important; border: none !important;}
		}
		#ftbg{
			background-color: #fabd06;
		}
		#logo{
			font-size: 25px;
			margin-top: 15px;
		}
		#clr{
			color: red;
		}
		#spanbg{
			background-color: #fabd06;
			border-radius: 10px;
			padding: 5px;
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
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
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="login.php">Login To Book Cab<span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</section>
	<div class="cover">
		<img class="img img-responsive" src="img/coverimage.jpeg">

		<div id="h">
			<p><b>Book a city Taxi to your destination in Town</b></p>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-sm">
					<div class="card text-center">
						<div class="card-header">
							Calculate Fare
						</div>
						<div class="card-body">
							<h5 class="card-title"><span id="spanbg">City Taxi</span></h5>
							<p class="card-text">Your Everyday Partner.</p>
							<form method="POST">
								<div class="form-group" style="color:grey;width: auto;">

									<select class="form-control bg-quote" name="pickup" id="pickup">
										<option value="" disabled selected>PICKUP</option>
										<option value="Charbagh">Charbagh</option>
										<option value="IndiraNagar">Indira Nagar</option>
										<option value="BBD">BBD</option>
										<option value="Barabanki">Barabanki</option>
										<option value="Faizabad">Faizabad</option>
										<option value="Basti">Basti </option>
										<option value="Gorakhpur">Gorakhpur</option>
									</select>


								</div>
								<div class="form-group">
									<select class="form-control bg-quote" name="drop" id="drop">
										<option value="" disabled selected>DROP</option>
										<option value="Charbagh">Charbagh</option>
										<option value="IndiraNagar">Indira Nagar</option>
										<option value="BBD">BBD</option>
										<option value="Barabanki">Barabanki</option>
										<option value="Faizabad">Faizabad</option>
										<option value="Basti">Basti </option>
										<option value="Gorakhpur">Gorakhpur</option>
									</select>
								</div>
								<div class="form-group ui-select">

									<select class="form-control bg-quote" name="type" id="cabtype">
										<option value="" disabled selected>CAB TYPE</option>
										<option value="CedMicro">CedMicro</option>
										<option value="CedMini">CedMini</option>
										<option value="CedRoyal">CedRoyal</option>
										<option value="CedSUV">CedSUV</option>
									</select>

								</div>
								<div class="form-group">

									<div class="form-group mt-3">
										<input type="number" class="form-control" id="luggage" placeholder="Weight">
									</div>
									<div class="form-group mt-3">
										<input type="text" class="form-control" id="fare" disabled>
									</div>

								</div>
								<button type="submit" class="btn btn-warning btn-lg form-control mb-5" id="button">Calculate Fare</button>

								<a type="submit" class="btn btn-warning btn-lg form-control mb-5" id="book" onclick="bk();">Book Cab</a>

							</form>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<a href="bookcab.php"></a>
				</div>
			</div>
		</div>
		<section id="ftbg">

			<footer class="page-footer font-small blue">


				<div class="row py-0">
					<div class="col-sm">
						<div class="footer-copyright text-center py-2" style="padding: :0;margin:0;">
							<i class="fa fa-twitter" style="font-size:40px;"></i>
							<i class="fa fa-whatsapp" style="font-size:40px;"></i>
							<i class="fa fa-youtube" style="font-size:40px;"></i>
							<i class="fa fa-skype" style="font-size:40px;"></i>

						</div>
					</div>
					<div class="col-sm text-center">
						<p id="logo">Ced<span id="clr">Cab</span></p>
					</div>
					<div class="col-sm">
						<div class="footer-copyright text-center py-3" style="font-size:20px;">© 2020 Copyright:
							<a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
						</div>
					</div>
				</div>


			</footer>

		</section>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
	</html>

	<script>

		$(document).ready(function(){
			$('#fare').hide();
			$('#book').hide();
			$('#button').click(function(e){
				e.preventDefault();
				if($('#pickup').val()==null){
					alert("Select Pickup Value");
					return;
				}
				else{
					var pickup=$('#pickup').val();
				}
				if($('#drop').val()==null){
					alert("Select Drop Value");
					return;
				}
				var drop=$('#drop').val();
				if (drop==pickup) {
					alert("Pickup and drop value is same");
					return;
				}
				if($('#cabtype').val()==null){
					alert("Select CabType");
					return;
				}
				var cabtype=$('#cabtype').val();
				if ($('#luggage').val()==null || $('#luggage').val()<0) {
					alert("Illegal Value of weight");
					return;
				}
				if ($('#luggage').val()==0) {
					var luggage=0;
				}
				if ($('#luggage').val()>0 &&  $('#luggage').val()<=10) {
					var luggage=50;
				}
				if ($('#luggage').val()>10 && $('#luggage').val()<=20) {
					var luggage=100;
				}
				if ($('#luggage').val()>20) {
					var luggage=200;
				}
				// console.log($('#luggage').val());
				$.ajax({
					url:'inaction.php',
					type:'POST',
					data:{pickup:pickup,drop:drop,cabtype:cabtype,luggage:luggage},
					success:function(result){
						console.log(result);
						$('#fare').show();
						$('#fare').val("Total Fare:"+result);
						$('#book').show();
					},
					error: function(){
						alert("error");
					}
				});
			});
		});
		function bk(){
			if($('#pickup').val()==null){
				alert("Select Pickup Value");
				return;
			}
			else{
				var pickup=$('#pickup').val();
			}
			if($('#drop').val()==null){
				alert("Select Drop Value");
				return;
			}
			var drop=$('#drop').val();
			if (drop==pickup) {
				alert("Pickup and drop value is same");
				return;
			}
			if($('#cabtype').val()==null){
				alert("Select CabType");
				return;
			}
			var cabtype=$('#cabtype').val();
			if ($('#luggage').val()==null || $('#luggage').val()<0) {
				alert("Illegal Value of weight");
				return;
			}
			if ($('#luggage').val()==0) {
				var luggage=0;
			}
			if ($('#luggage').val()>0 &&  $('#luggage').val()<=10) {
				var luggage=50;
			}
			if ($('#luggage').val()>10 && $('#luggage').val()<=20) {
				var luggage=100;
			}
			if ($('#luggage').val()>20) {
				var luggage=200;
			}
			alert("Login To Book Cab");
			$.ajax({
				url:'ridedata.php',
				type:'GET',
				data:{pickup:pickup,drop:drop,cabtype:cabtype,luggage:luggage},
				success:function(result){
					console.log(result);
				},
				error: function(){
					alert("error");
				}
			});
			window.location.href='http://localhost/task/cedcab/user/login.php';
		}
	</script>
