<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,
"SELECT * FROM user 
WHERE username='$username'
AND password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0){

    $d = mysqli_fetch_assoc($data);

    if($d['role']=="admin"){

        $_SESSION['role']="admin";
       header("location:admin/admin.php");

    }else{

        $_SESSION['role']="penyewa";
       header("location:penyewa/penyewa.php");

    }

}else{

    echo "Login gagal";

}
?>