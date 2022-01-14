<?php require_once "controlUser.php"; ?>

<!-- jika user tidak melakukan reset maka akan dibawa ke login page -->
<?php
if($_SESSION['info'] == false){
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
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="loginPage.php" method="POST">
                    <h2 type="title">Reset Password</h2>

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