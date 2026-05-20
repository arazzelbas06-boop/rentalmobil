<?php
include '../koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM mobil");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penyewa</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        /* NAVBAR */

        .navbar{
            background:#1d3557;
            padding:15px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo{
            color:white;
            font-size:24px;
            font-weight:bold;
        }

        .menu a{
            color:white;
            text-decoration:none;
            margin-left:15px;
            padding:10px 15px;
            border-radius:5px;
            transition:0.3s;
        }

        .menu a:hover{
            background:#457b9d;
        }

        /* CONTAINER */

        .container{
            width:90%;
            margin:30px auto;
        }

        .title{
            margin-bottom:25px;
            color:#1d3557;
        }

        /* CARD */

        .card-container{
            display:flex;
            flex-wrap:wrap;
            gap:25px;
        }

        .card{
            background:white;
            width:300px;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card-header{
            background:#457b9d;
            color:white;
            padding:20px;
            text-align:center;
        }

        .card-body{
            padding:20px;
        }

        .card-body p{
            margin-bottom:12px;
            color:#333;
            font-size:15px;
        }

        .card-body input{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
            margin-top:10px;
        }

        .btn{
            width:100%;
            padding:12px;
            margin-top:15px;
            border:none;
            background:#1d3557;
            color:white;
            border-radius:5px;
            cursor:pointer;
            font-size:15px;
            transition:0.3s;
        }

        .btn:hover{
            background:#457b9d;
        }

        /* FOOTER */

        footer{
            margin-top:50px;
            background:#1d3557;
            color:white;
            text-align:center;
            padding:15px;
        }

    </style>

</head>
<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">
            Rental Mobil
        </div>

        <div class="menu">

            <a href="penyewa.php">
                Dashboard
            </a>

            <a href="../logout.php">
                Logout
            </a>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="container">

        <h2 class="title">
            Daftar Mobil Tersedia
        </h2>

        <div class="card-container">

            <?php
            while($d = mysqli_fetch_array($data)){
            ?>

            <div class="card">

                <div class="card-header">

                    <h3>
                        <?php echo $d['nama_mobil']; ?>
                    </h3>

                </div>

                <div class="card-body">

                    <p>
                        <b>Stok :</b>
                        <?php echo $d['jumlah']; ?>
                    </p>

                    <p>
                        <b>Kondisi :</b>
                        <?php echo $d['kondisi']; ?>
                    </p>

                    <p>
                        <b>Harga :</b>
                        Rp <?php echo number_format($d['harga_sewa']); ?>
                    </p>

                    <form method="POST" action="sewa.php">

                        <input type="hidden"
                        name="id_mobil"
                        value="<?php echo $d['id_mobil']; ?>">

                        <input type="number"
                        name="jumlah"
                        placeholder="Jumlah sewa"
                        required>

                        <button type="submit" class="btn">
                            Sewa Mobil
                        </button>

                    </form>

                </div>

            </div>

            <?php
            }
            ?>

        </div>

    </div>

    <!-- FOOTER -->

    <footer>

        <p>
            © 2026 Rental Mobil | Dashboard Penyewa
        </p>

    </footer>

</body>
</html>