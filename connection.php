<?php
//menghubungkan ke database localhost, user, pass, nama tabel 
$con = mysqli_connect('localhost', 'root', '', 'db_sudutkopi');

//cek koneksi
if (mysqli_connect_error()){
    echo "Koneksi ke database gagal: " . mysqli_connect_error();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

