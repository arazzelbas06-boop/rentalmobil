<?php
include '../koneksi.php';

if(isset($_POST['submit'])){

    $nama_mobil = $_POST['nama_mobil'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $harga_sewa = $_POST['harga_sewa'];

    mysqli_query($koneksi,
    "INSERT INTO mobil
    (nama_mobil,jumlah,kondisi,harga_sewa)

    VALUES
    ('$nama_mobil','$jumlah','$kondisi','$harga_sewa')");

    header("location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#f4f6f9;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#1d3557;
        }

        .input-group{
            margin-bottom:15px;
        }

        .input-group label{
            display:block;
            margin-bottom:5px;
        }

        .input-group input{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            background:#1d3557;
            color:white;
            border-radius:5px;
            cursor:pointer;
            font-size:15px;
        }

        .btn:hover{
            background:#457b9d;
        }

        .kembali{
            display:block;
            text-align:center;
            margin-top:15px;
            text-decoration:none;
            color:#1d3557;
        }

    </style>

</head>
<body>

    <div class="container">

        <h2>Tambah Mobil</h2>

        <form method="POST">

            <div class="input-group">
                <label>Nama Mobil</label>
                <input type="text"
                name="nama_mobil"
                required>
            </div>

            <div class="input-group">
                <label>Jumlah Mobil</label>
                <input type="number"
                name="jumlah"
                required>
            </div>

            <div class="input-group">
                <label>Kondisi Mobil</label>
                <input type="text"
                name="kondisi"
                required>
            </div>

            <div class="input-group">
                <label>Harga Sewa</label>
                <input type="number"
                name="harga_sewa"
                required>
            </div>

            <button type="submit"
            name="submit"
            class="btn">

                Simpan

            </button>

        </form>

        <a href="admin.php" class="kembali">
            Kembali
        </a>

    </div>

</body>
</html>