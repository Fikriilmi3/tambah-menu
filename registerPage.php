<?php require_once "controlUser.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Akun</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="registerPage.php" method="POST" autocomplete="">
                    <h2 class="title">Sign Up</h2>
                    <p class="desc">Daftarkan akun anda sekarang untuk dapat mengakses website Kafe Sudut Kopi</p>
                    
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

                    <!-- kolom untuk mengisi data akun yang akan didaftarkan -->
                    <div class="bar">        <!--nama user-->
                        <input class="input" type="text" name="nama" placeholder="Nama Lengkap" required value="<?php echo $nama ?>">
                    </div>
                    <div class="bar space">        <!--alamat email-->
                        <input class="input" type="email" name="email" placeholder="Alamat Email" required value="<?php echo $email ?>">
                    </div>
                    <div class="bar space">        <!--password-->
                        <input class="input" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="bar space">        <!--konfirmasi password-->
                        <input class="input" type="password" name="confirmpassword" placeholder="Konfirmasi Ulang password" required>
                    </div>

                    <!-- tombol submit untuk memasukkan data ke dalam database -->
                    <div class="space">
                        <input class="button" type="submit" name="signup" value="Daftar">
                    </div>

                    <!-- link jika user telah memiliki akun -->
                    <div class="link_register spaceEX">Sudah punya akun?
                        <a href="loginPage.php">Login disini!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>