<?php
include '../koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM mobil");

$total_mobil = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM mobil")
);

$total_penyewa = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM user WHERE role='penyewa'")
);

$total_sewa = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM penyewaan")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

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
            margin-bottom:20px;
            color:#1d3557;
        }

        .btn-tambah{
            display:inline-block;
            margin-bottom:20px;
            background:#2a9d8f;
            color:white;
            padding:12px 18px;
            text-decoration:none;
            border-radius:6px;
            transition:0.3s;
        }

        .btn-tambah:hover{
            background:#21867a;
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        table th{
            background:#457b9d;
            color:white;
            padding:15px;
        }

        table td{
            padding:15px;
            border-bottom:1px solid #ddd;
            text-align:center;
        }

        table tr:hover{
            background:#f1f1f1;
        }

        /* BUTTON */

        .edit{
            background:orange;
            color:white;
            padding:8px 12px;
            border-radius:5px;
            text-decoration:none;
        }

        .hapus{
            background:red;
            color:white;
            padding:8px 12px;
            border-radius:5px;
            text-decoration:none;
        }

        .edit:hover{
            background:#cc8400;
        }

        .hapus:hover{
            background:#cc0000;
        }

        /* FOOTER */

        footer{
            margin-top:40px;
            background:#1d3557;
            color:white;
            text-align:center;
            padding:15px;
        }

        /* DASHBOARD CARD */

.dashboard-container{
    display:flex;
    gap:25px;
    margin-bottom:30px;
    flex-wrap:wrap;
    padding: 50px 100px;
}

.dashboard-card{
    flex:1;
    min-width:250px;
    padding:25px;
    border-radius:15px;
    display:flex;
    align-items:center;
    gap:20px;
    color:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.dashboard-card:hover{
    transform:translateY(-5px);
}

.dashboard-card .icon{
    font-size:50px;
    background:rgba(255,255,255,0.2);
    width:80px;
    height:80px;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
}

.dashboard-card .info h3{
    font-size:18px;
    margin-bottom:10px;
}

.dashboard-card .info h1{
    font-size:40px;
}

/* WARNA */

.mobil{
    background:linear-gradient(135deg,#457b9d,#1d3557);
}

.penyewa{
    background:linear-gradient(135deg,#2a9d8f,#21867a);
}

.sewa{
    background:linear-gradient(135deg,#f4a261,#e76f51);
}
.card-link{
    text-decoration:none;
    flex:1;
}

    </style>
<!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">
            Rental Mobil
        </div>

        <div class="menu">

            <a href="admin.php">
                Dashboard
            </a>

            <a href="tambah_mobil.php">
                Tambah Mobil
            </a>


            <a href="../logout.php">
                Logout
            </a>

        </div>

    </div>
</head>
<body>

<div class="dashboard-container">

    <!-- TOTAL MOBIL -->

    <a href="admin.php" class="card-link">

        <div class="dashboard-card mobil">

            <div class="icon">
                🚗
            </div>

            <div class="info">

                <h3>Total Mobil</h3>

                <h1>
                    <?php echo $total_mobil; ?>
                </h1>

            </div>

        </div>

    </a>

    <!-- TOTAL PENYEWA -->

    <a href="../admin/data_penyewa.php" class="card-link">

        <div class="dashboard-card penyewa">

            <div class="icon">
                👤
            </div>

            <div class="info">

                <h3>Total Penyewa</h3>

                <h1>
                    <?php echo $total_penyewa; ?>
                </h1>

            </div>

        </div>

    </a>

    <!-- TOTAL PENYEWAAN -->

    <a href="laporan.php" class="card-link">

        <div class="dashboard-card sewa">

            <div class="icon">
                📄
            </div>

            <div class="info">

                <h3>Total Penyewaan</h3>

                <h1>
                    <?php echo $total_sewa; ?>
                </h1>

            </div>

        </div>

    </a>

</div>

    <!-- CONTENT -->

    <div class="container">

        <h2 class="title">
            Dashboard Admin
        </h2>

        <a href="tambah_mobil.php" class="btn-tambah">
            + Tambah Mobil
        </a>

        <table>

            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Harga Sewa</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>

                <td>
                    <?php echo $no++; ?>
                </td>

                <td>
                    <?php echo $d['nama_mobil']; ?>
                </td>

                <td>
                    <?php echo $d['jumlah']; ?>
                </td>

                <td>
                    <?php echo $d['kondisi']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($d['harga_sewa']); ?>
                </td>

                <td>

                    <a class="edit"
                    href="edit_mobil.php?id=<?php echo $d['id_mobil']; ?>">

                        Edit

                    </a>

                    <a class="hapus"
                    href="hapus_mobil.php?id=<?php echo $d['id_mobil']; ?>">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php
            }
            ?>

        </table>

    </div>

    <!-- FOOTER -->

    <footer>

        <p>
            © 2026 Rental Mobil | PHP & MySQL
        </p>

    </footer>

</body>
</html>