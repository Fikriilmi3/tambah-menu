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
<body style="background-color: #F0F8FF;">
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>
	<!-- header -->
		<div class="medsos">
			<div class="container">
				<ul>
					<li><a href="#"><i class="fab fa-facebook"></i></a></li>
					<li><a href="https://www.instagram.com/sudut.kopi.id/"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
				</ul>
			</div>
		</div>
		<header>
			<div class="container">
				<h1><a href="index.php"><strong>Cafe </strong>Sudut Kopi</a></h1>
				<ul>
					<li class="active"><a href="index.php">HOME</a></li>
					<li><a href="daftar_menu.php">MENU</a></li>
					<li><a href="pesanan.php">PESANAN</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
		</header>

		<!-- banner -->
		<section class="banner">
			<h2>WELCOME TO WEBSITE CAFE SUDUT KOPI</h2>
		</section>

	<!-- about -->
	<section class="about">
		<div class="container">
			<h2>ABOUT</h2>
			<p>Sudut Kopi merupakan cafe menarik yang menyediakan menu minuman kopi dan berbagai menu minuman lainnya 
            		termasuk makanan yang mampu menemani kegiatan ngopi Anda<br>Sudut Kopi buka <strong>24 JAM</strong></p>
		</div>
	</section>

	<!-- menu -->
	<section class="menu">
		<div class="container">
			<h2>MENU</h2>
			<div class="box">
				<div class="col-4">
					<div class="icon"><i class="fas fa-coffee"></i></div>
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
	
	<section class="lokasi">
		<div class="container">
          <h2> LOKASI</h2>
          <p>Sumbersari, JEMBER</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3361730739057!2d113.72364421437075!3d-8.16884648412421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695a7edee5bcf%3A0x92ca3f9f74bc5b15!2sSudut%20Kopi!5e0!3m2!1sid!2sid!4v1638340918735!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;"
			    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
	</section>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 -Cafe Sudut Kopi. All Rights Reserved.</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>
</body>
</html>
