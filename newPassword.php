<?php require_once "controlUser.php"; ?>

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
    <title>Create a New Password</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="newPassword.php" method="POST" autocomplete="off">
                    <h2 class="title">Reset Password</h2>
                    <p class="desc">Silahkan masukan password baru anda</p>
                    
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
                    
                    <div class="bar">
                        <input class="input" type="password" name="password" placeholder="Masukkan password baru anda" required>
                    </div>
                    <div class="bar space">
                        <input class="input" type="password" name="confirmpassword" placeholder="Ketik ulang password baru anda" required>
                    </div>
                    <div class="space">
                        <input class="button" type="submit" name="change_password" value="Konfirmasi">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>