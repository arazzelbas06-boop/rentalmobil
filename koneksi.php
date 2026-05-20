<?php

$koneksi = mysqli_connect(
    "127.0.0.1",
    "root",
    "arazzelbas06",
    "rental_mobil"
);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>