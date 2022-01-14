<?php require_once "controlUser.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kafe Sudut Kopi</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="loginPage.php" method="POST" autocomplete="">
                    <h2 class="title">Login</h2>
                    <p class="desc">Silahkan login terlebih dahulu</p>

                    <!-- jika terdapat error -->
                    <?php 
                        if (count($errors) > 0){
                            ?>
                            <p class="alert">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </p>
                            <?php
                        }
                    ?>
                    
                    <!-- kolom untuk mengisi email dan password untuk login -->
                    <div class="bar">
                        <input class="input" type="email" name="email" placeholder="Alamat Email" required value="<?php echo $email ?>">
                    </div>
                    <div class="bar space">
                        <input class="input" type="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <!-- link button jika user lupa password -->
                    <div class="link_forget"><a href="forgetPass.php">Lupa password?</a></div>
                    
                    <!-- button tombol login -->
                    <div class="space">
                        <input class="button"  type="submit" name="login" value="Login">
                    </div>

                    <!-- link button untuk register -->
                    <div class="link_register spaceEX">Belum punya akun?
                        <a href="registerPage.php">Signup disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>