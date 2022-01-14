<?php require_once "controlUser.php"; ?>

<!-- jika tidak ada email saat mengakses page ini maka akan user akan diarahkan ke login page -->
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: loginPage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Akun</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="confirmAcc.php" method="POST" autocomplete="off">
                    <h2 class="title">Verifikasi Email</h2>
                    <p class="desc">Silahkan cek email anda</p>
                    
                    <!-- jika berhasil -->
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="notifSuccess">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <!-- jika terdapat error -->
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- kolom untuk mengisi kode verifikasi -->
                    <div class="bar">
                        <input class="input" type="text" name="otp" placeholder="Masukkan kode verifikasi" required>
                    </div>

                    <!-- tombol untuk memverifikasi email -->
                    <div class="space">
                        <input class="button" type="submit" name="check" value="Verifikasi Email">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>