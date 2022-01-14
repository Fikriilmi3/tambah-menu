<?php 
session_start();
require "connection.php";
$email = "";
$nama = "";
$errors = array();

    //Jika user melakukan login (loginPage.php)
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM akun_user WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        
        //untuk mengecek
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            
            //untuk mengecek apakah email atau password benar
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                
                //mengecek apakah akun telah terverifikasi atau belum
                $status = $fetch['status'];
                if($status == 'verified'){
                  session_start();
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  header('location:index.php');
                    
                    //mengecek level atau jenis akun 
                    // if($data['level'] == "admin"){              //jika akun adalah admin
                    //     header('location: ');       //nama file untuk homepage admin
                    // }else if($data['level'] == "pegawai"){      //jika akun adalah pegawai
                    //     header('location : ');      //nama file untuk homepage pegawai
                    // }else{                                      //jika akun adalah user atau pelanggan
                    //     header('location : index.php');      //nama file untuk homepage user
                    // }

                }else{      //jika akun belum terverifikasi
                    $info = "Anda belum memverifikasi email - $email";
                    $_SESSION['info'] = $info;
                    header('location: ');           //nama file untuk kode
                }
            
            }else{      //jika email salah
                $errors['email'] = "Email atau Password salah!";
            }
        }else{  //jika email tidak terdaftar
            $errors['email'] = "Silahkan mendaftar terlebih dahulu pada link dibawah untuk membuat akun";
        }
    }

    //jika user melakukan sign up atau register (registerPage.php)
    if(isset($_POST['signup'])){
        $nama = mysqli_real_escape_string($con, $_POST['nama']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

        //mengecek apakah password yang dimasukkan sama
        if($password !== $confirmpassword){
            $errors['password'] = "Password salah, pastikan password yang anda masukkan benar!";
        }

        //mengecek apakah email yang dimasukkan telah terdaftar
        $email_check = "SELECT * FROM akun_user WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email yang dimasukkan telah terdaftar!";
        }

        //memasukkan input user ke dalam database
        if(count($errors) === 0){
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $code = rand(999999, 111111);   //kode untuk verifikasi email
            $level = "kustomer";            //level akun
            $status = "notverified";        //status belum terverifikasi untuk akun yang baru terdaftar
            
            //memasukkan data ke dalam database
            $insert_data = "INSERT INTO akun_user (nama, email, password, level, status, kode)
                            values('$nama', '$email', '$encpass', '$level', '$status', '$code')";
            $data_check = mysqli_query($con, $insert_data);
            
            //mengirim email yang berisi kode verifikasi
            if($data_check){
                $subject = "Kode Verifikasi Akun Anda";
                $message = "Selamat datang dan terima kasih telah mendaftarkan akun anda di website Kafe Sudut Kopi, silahkan verifikasi akun anda dengan memasukkan kode berikut $code";
                $sender = "From: yuzuriha445@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Kode verifikasi telah terkirim ke email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: confirmAcc.php'); //verifikasi email atau akun
                    exit();
                
                }else{      //jika terjadi error saat mengirim email kode verifikasi
                    $errors['otp-error'] = "ERROR! Terjadi kesalahan saat mengirim kode verifikasi!";
                }
            
            }else{          //jika terjadi error saat memasukkan data ke dalam database
                $errors['db-error'] = "ERROR! Terjadi kesalahan saat mendaftarkan akun!";
            }
        }
    }

    //Jika User memverifikasi email (confirmAcc.php)
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM akun_user WHERE kode = $otp_code";
        $code_res = mysqli_query($con, $check_code);

        //mengecek kode dan mengupdate status akun
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['kode'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE akun_user SET kode = $code, status = '$status' WHERE kode = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            
            //menjalankan syntax update
            if($update_res){
                $_SESSION['nama'] = $nama;
                $_SESSION['email'] = $email;
                header('location: registerSuccess.php');   //homepage
                exit();
            }else{  //jika gagal mengupdate status akun
                $errors['otp-error'] = "ERROR! Terjadi kesalahan saat memverifikasi email!";
            }
        }else{  //jika kode yang dimasukkan salah
            $errors['otp-error'] = "Kode yang anda masukkan salah!";
        }
    }

    // mengirim kode reset password ke email user jika lupa password (forgetPass.php)
    if(isset($_POST['sendCode'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM akun_user WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);

        //mengupdate kode untuk mereset password
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE akun_user SET kode = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            
            //menjalankan syntax update dan mempersiapkan pesan email
            if($run_query){
                $subject = "Kode untuk reset Password";
                $message = "Kode untuk mereset password anda adalah $code jangan bagikan kode tersebut dengan orang lain.";
                $sender = "From: yuzuriha445@gmail.com";

                //mengirim email berisi kode reset
                if(mail($email, $subject, $message, $sender)){
                    $info = "Kode telah terkirim ke $email silahkan cek pada pesan masuk";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: codeVerification.php');
                    exit();
                }else{  //jika gagal mengirim email
                    $errors['otp-error'] = "ERROR! Terjadi kesalahan saat mengirim email";
                }
            }else{  //jika gagal menjalankan syntax update
                $errors['db-error'] = "ERROR! Terjadi kesalahan pada database silahkan coba lagi nanti";
            }
        }else{  //jika email tidak terdaftar
            $errors['email'] = "Email tersebut tidak terdaftar!";
        }
    }

    //memverifikasi kode untuk reset password (codeVerification.php)
    if(isset($_POST['otp_reset'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM akun_user WHERE kode = $otp_code";
        $code_res = mysqli_query($con, $check_code);

        //untuk mengecek apakah kode sama
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            header('location: newPassword.php');       //link untuk memasukkan password baru
            exit();
        }else{  //jika kode tidak sama
            $errors['otp-error'] = "Kode yang anda masukkan salah!";
        }
    }
 
    //mengganti password akun (newPassword.php)
    if(isset($_POST['change_password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
        
        //mengecek apakah password baru cocok
        if($password !== $confirmpassword){
            $errors['password'] = "Password tidak cocok!";
        }else{  //jika cocok
            $code = 0;      //untuk menghapus kode
            $email = $_SESSION['email']; //untuk mendapatkan email
            $encpass = password_hash($password, PASSWORD_BCRYPT);

            //menghapus kode dan mengganti password akun
            $update_pass = "UPDATE akun_user SET kode = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);

            //jika berhasil menjalankan query
            if($run_query){
                $info = "Password telah diganti, silahkan login ke dalam akun anda";
                $_SESSION['info'] = $info;
                header('Location: ChangePassSuccess.php');
            }else{  //jika gagal
                $errors['db-error'] = "ERROR! Terjadi kesalahan saat mengganti password";
            }
        }
    }

    //login setelah reset password berhasil
    if(isset($_POST['loginPage'])){
        header('Location: loginPage.php');
    }
?>