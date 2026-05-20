<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM mobil
WHERE id_mobil='$id'");

header("location:admin.php");
?>