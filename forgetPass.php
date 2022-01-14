<?php require_once "controlUser.php"; ?>

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
                <form action="forgetPass.php" method="POST" autocomplete="">
                    <h2 class="title">Reset Password</h2>
                    <p class="desc">Masukkan email anda</p>
                    
                    <!-- jika terjadi error -->
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>

                    <!-- kolom untuk memasukkan email -->
                    <div class="bar">
                        <input class="input" type="email" name="email" placeholder="Masukkan alamat email" required value="<?php echo $email ?>">
                    </div>

                    <!-- tombol untuk mengirim kode ke email -->
                    <div class="space">
                        <input class="button" type="submit" name="sendCode" value="Continue">
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>