<?php
include '../koneksi.php';

$id_user = 2;

$id_mobil = $_POST['id_mobil'];

$jumlah = $_POST['jumlah'];

mysqli_query(
    $koneksi,
    "CALL sewa_mobil('$id_user','$id_mobil','$jumlah')"
);

echo "Mobil berhasil disewa";

echo "<br><br>";

echo "<a href='penyewa.php'>Kembali</a>";
?>