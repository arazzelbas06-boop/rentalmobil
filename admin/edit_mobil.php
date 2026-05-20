<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM mobil WHERE id_mobil='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['submit'])){

    $nama_mobil = $_POST['nama_mobil'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $harga_sewa = $_POST['harga_sewa'];

    mysqli_query($koneksi,
    "UPDATE mobil SET

    nama_mobil='$nama_mobil',
    jumlah='$jumlah',
    kondisi='$kondisi',
    harga_sewa='$harga_sewa'

    WHERE id_mobil='$id'
    ");

    header("location:admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mobil</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f6f9;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:12px;
            background:#1d3557;
            color:white;
            border:none;
        }

    </style>

</head>
<body>

<div class="container">

<h2>Edit Mobil</h2>

<form method="POST">

    <input type="text"
    name="nama_mobil"

    value="<?php echo $d['nama_mobil']; ?>">

    <input type="number"
    name="jumlah"

    value="<?php echo $d['jumlah']; ?>">

    <input type="text"
    name="kondisi"

    value="<?php echo $d['kondisi']; ?>">

    <input type="number"
    name="harga_sewa"

    value="<?php echo $d['harga_sewa']; ?>">

    <button type="submit"
    name="submit">

        Update

    </button>

</form>

</div>

</body>
</html>