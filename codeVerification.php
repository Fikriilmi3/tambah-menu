<?php require_once "controlUser.php"; ?>

<!-- jika tidak ada email maka akan diarahkan ke login page -->
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: loginPage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="codeVerification.php" method="POST" autocomplete="off">
                    <h2 class="title">Masukkan Kode Verifikasi</h2>

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

                    <!-- jika terjadi error -->
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- kolom untuk memasukkan kode otp -->
                    <div class="bar">
                        <input class="input" type="text" name="otp" placeholder="Masukkan kode" required>
                    </div>

                    <!-- tombol untuk mengecek kode -->
                    <div class="space">
                        <input class="button" type="submit" name="otp_reset" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>