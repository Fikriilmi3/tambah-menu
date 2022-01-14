<?php
	session_start();
	$email = isset($_SESSION['email'])? $_SESSION['email'] :null ;
	if($email == false){
		header('Location: loginPage.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cafe Sudut Kopi</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="medsos">
		<div class="container">
			<ul>
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
			</ul>
		</div>
	</div>
	<header>
		<div class="container">
			<h1><a href="index.php">Cafe Sudut Kopi</a></h1>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li class="active"><a href="menu.php">MENU</a></li>
				<li><a href="contact.php">CONTACT</a></li>
			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Home / Menu</p>
		</div>
	</section>

	<!-- Menu -->
	<section class="menu">
		<div class="container">
			<h3>MENU</h3>
			<div class="box">
				<div class="col-4">
					<div class="icon"><li><a href="menuCoffeeList.php"><i class="fas fa-coffee"></i></a></li></div>
					<h4>Coffee</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-drink"></i></div>
					<h4>Drink</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-food"></i></div>
					<h4>Food</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-other"></i></div>
					<h4>Other</h4>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Sudut Kopi. All Rights Reserved.</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>
</body>
</html>
