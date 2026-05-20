<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM penyewaan
WHERE id_sewa='$id'");

$d = mysqli_fetch_array($data);

$id_mobil = $d['id_mobil'];

$jumlah = $d['jumlah_sewa'];

$tanggal_sewa = strtotime($d['tanggal_sewa']);

$hari_ini = strtotime(date('Y-m-d'));

$selisih = ($hari_ini - $tanggal_sewa) / 86400;

$denda = 0;

if($selisih > 3){

    $denda = ($selisih - 3) * 50000;

}

mysqli_query($koneksi,
"UPDATE mobil
SET jumlah = jumlah + '$jumlah'
WHERE id_mobil='$id_mobil'");

mysqli_query($koneksi,
"UPDATE penyewaan SET

status='Dikembalikan',
tanggal_kembali=CURDATE(),
denda='$denda'

WHERE id_sewa='$id'
");

header("location:laporan.php");
?>