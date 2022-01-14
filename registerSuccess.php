<?php require_once "controlUser.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register akun</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="loginPage.php" method="POST">
                    <h2 class="title">Register akun</h2>
                    <p class="desc">Terima kasih telah mendaftarkan akun anda, silahkan login melalui tombol berikut</p>
                
                    <!-- tombol untuk ke login page -->
                    <div class="space">
                        <input class="button" type="submit" name="loginPage" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>