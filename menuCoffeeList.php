<?php
	session_start();
	$email = isset($_SESSION['email'])? $_SESSION['email'] :null ;
	if($email == false){
		header('Location: loginPage.php');
	}
	require "connection.php";
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
				<!-- <li><a href="cart.php">CART</a></li>
					<?php
					// if (isset($_SESSION['cart'])) {
					// 	$count = count($_SESSION['cart']);
					// 	echo "$count";
					// }else {
					// 	echo "0";
					// }
					?> -->
			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Home / Menu / Coffee</p>
		</div>
	</section>

	<!-- Menu -->
	<section class="menu">
		<div class="cartTable">
				<h3>CART</h3> </br>
			<div class="table-responsive" style="padding-left: 100px; padding-right: 100px">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nama pesanan</th>
						<th width="10%">Jumlah</th>
						<th width="20%">Harga</th>
						<th width="15%">Order Total</th>
						<th width="5%">Action</th>
					</tr>

					<?php
            if (!empty($_SESSION["cart"])) {
                $total= 0;
                foreach($_SESSION["cart"] as $keys => $values){ ?>
                    <tr>
                        <td><?php echo $values["food_name"]; ?></td>
                        <td><?php echo $values["food_quantity"] ?></td>
                        <td>&#82;&#112; <?php echo $values["food_price"]; ?></td>
                        <td>&#82;&#112; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
                        <td><a href="menuCoffeeList.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php 
                    $total = $total + ($values["food_quantity"] * $values["food_price"]);
                    }
                    ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">&#82;&#112; <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }
                ?>

			<?php
			// echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>';
			?>
				</table>
				</br></br>
				<div class="cartButton">
					<button class="emptyCart" onclick="location.href='menuCoffeeList.php?action=empty'">Kosongkan Keranjang</button>
					<form method="POST">
						<input type="submit" name="pay" value="Checkout">
					</form>
				</div>
			</div>
		</div>
		</br></br>

		<!-- <div class="tableEdit">
			<form method="POST" action="menuCoffeeList.php">
				<label class="selTab">Silahkan masukkan nomor meja</label></br>
				<select name="tableNum">
					<option value="">Nomor Meja</option>
					
					<?php
					// for ($i=1; $i<=20 ; $i++) { 
					// 	echo "<option value=Meja ".$i.">Meja ".$i."</option>";
					// }
					?>

				</select>
			</form>
		</div> -->
		<div class="menuShow">
			<?php
                require "connection.php";
                $show_menu = "SELECT * FROM makanan WHERE kategori = 'kopi' ORDER BY id_menu";
                $result = mysqli_query($con, $show_menu);

                if (mysqli_num_rows($result) > 0) {
                    $count=0;

                    while($row = mysqli_fetch_assoc($result)){
                        if ($count == 0)
                        echo "<div class='row'>";
                        ?>

                        <div class="col-md-3">
                            <form method="post" action="menuCoffeeList.php?action=add&id=<?php echo $row['id_menu'];?>">
                                <div class="mypanel" align="center";>
                                
                                <img src="<?php echo $row["images_path"]; ?>" class="img_food">
                                <h4 class="nama_menu"><?php echo $row["nama_makanan"]; ?></h4>
                                <h5 class="info_menu"><?php echo $row["info"]; ?></h5>
                                <h5 class="ket_menu"><?php echo $row["ket"]; ?></h5>
                                <h5 class="harga">&#82;&#112; <?php echo $row["harga"]; ?>/-</h5>
                                <h5 class="info_menu">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                                
								
                                
								<input type="hidden" name="hidden_name" value="<?php echo $row["nama_makanan"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["harga"]; ?>">
                                <input type="submit" name="add" style="margin-top:5px;" class="order_btn" value="Pesan">
                                </div>
                            </form>
                        </div>
                        
                        <?php
                        $count++;
                        if ($count == 4) {
                            echo "</div>";
                            $count = 0;
                        }
                    }
                    ?>
                <?php
                } else { ?>
                    <h1>Tidak ada makanan yang tersedia</h1>
                    <?php
                }
                
            ?>
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

<?php
    if (isset($_POST["add"])) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], "food_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'food_id'       => $_GET["id"],
                    'food_name'     => $_POST["hidden_name"],
                    'food_price'    => $_POST["hidden_price"],
                    'food_quantity' => $_POST["quantity"]
                );
                $_SESSION["cart"] [$count] = $item_array;
				echo '<script>alert("Makanan berhasil ditambahkan")</script>';
                echo '<script>window.location="menuCoffeeList.php"</script>';
            }else{
                echo '<script>alert("Makanan telah ada di keranjang")</script>';
                echo '<script>window.location="menuCoffeeList.php"</script>';
            }
        }else {
            $item_array = array(
                'food_id'           => $_GET["id"],
                'food_name'         => $_POST["hidden_name"],
                'food_price'        => $_POST["hidden_price"],
                'food_quantity'     => $_POST["quantity"]
            );
            $_SESSION["cart"] [0] = $item_array;
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach($_SESSION["cart"] as $keys => $values){
                if($values["food_id"] == $_GET["id"]){
                    unset($_SESSION["cart"] [$keys]);
                    echo '<script>alert("Makanan dihapus")</script>';
                    echo '<script>window.location = "menuCoffeeList.php"</script>';
                }
            }
        }
    }

	if(isset($_GET["action"])){
		if($_GET["action"] == "empty"){
			foreach($_SESSION["cart"] as $keys => $values){
				unset($_SESSION["cart"]);
				echo '<script>alert("Keranjang Telah Dikosongkan!")</script>';
				echo '<script>window.location="menuCoffeeList.php"</script>';

			}
		}
	}

	if (isset($_POST["pay"])) {
		$grandtotal = 0;
			foreach($_SESSION["cart"] as $keys => $values){
				$foodId = $values["food_id"];
				$foodName = $values["food_name"];
				$quantity = $values["food_quantity"];
				$price = $values["food_price"];
				$total = ($values["food_quantity"] * $values["food_price"]);
				$email = $_SESSION["email"];
		
				$grandtotal = $grandtotal + $total;
		
				$query = "INSERT INTO orders (id_menu, nama_makanan, harga, jumlah, email)
				VALUES ('" .$foodId . "','" .$foodName. "','" .$price. "','" .$quantity. "','" .$email."')";
				$success = $con ->query($query);
		
				if (!$success) {
					echo '<script>alert("Terjadi kesalahan, silahkan coba lagi nanti")</script>';
					echo '<script>window.location="menuCoffeeList.php"</script>';
				}
			}
			?>
			<?php
			foreach($_SESSION["cart"] as $keys => $values){
					unset($_SESSION["cart"]);
					echo '<script>alert("Terima Kasih Telah Memesan")</script>';
					echo '<script>window.location="menuCoffeeList.php"</script>';
				}
			?>
			<?php
	}
?>
