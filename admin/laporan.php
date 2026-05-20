<?php
include '../koneksi.php';

$tanggal = "";

if(isset($_GET['tanggal'])){

    $tanggal = $_GET['tanggal'];

    $data = mysqli_query($koneksi,
    "SELECT * FROM penyewaan
    WHERE tanggal_sewa='$tanggal'");

}else{

    $data = mysqli_query($koneksi,
    "SELECT * FROM penyewaan");

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Laporan Penyewaan</title>
    <div class="top-bar">

 

</div>

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

        /* TOP BAR */

.top-bar{
    display:flex;
    justify-content:flex-end;
    margin-bottom:20px;
}

.logout-btn{
    background:red;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:5px;
    transition:0.3s;
}

.logout-btn:hover{
    background:darkred;
}



        /* CONTAINER */

        .container{
            width:90%;
            margin:30px auto;
        }

        .title{
            color:#1d3557;
            margin-bottom:20px;
        }

        /* FORM */

        .form-cari{
            margin-bottom:25px;
            display:flex;
            gap:10px;
        }

        .form-cari input{
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .form-cari button{
            background:#1d3557;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

        .form-cari button:hover{
            background:#457b9d;
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

        /* STATUS */

        .dipinjam{
            background:orange;
            color:white;
            padding:5px 10px;
            border-radius:5px;
        }

        .kembali{
            background:green;
            color:white;
            padding:5px 10px;
            border-radius:5px;
        }

        /* BUTTON */

        .btn{
            background:#2a9d8f;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
            transition:0.3s;
        }

        .btn:hover{
            background:#21867a;
        }

    </style>

</head>
<body>

    <!-- CONTENT -->

    <div class="container">

        <h2 class="title">
            Laporan Penyewaan Mobil
        </h2>

        <!-- FORM CARI -->

        <form method="GET" class="form-cari">

            <input type="date"
            name="tanggal"
            value="<?php echo $tanggal; ?>">

            <button type="submit">
                Cari
            </button>
               <a href="../admin/admin.php" class="logout-btn">
        KELUAR
    </a>

        </form>

        <!-- TABLE -->

        <table>

            <tr>

                <th>ID</th>
                <th>ID User</th>
                <th>ID Mobil</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Aksi</th>

            </tr>

            <?php
            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>

                <td>
                    <?php echo $d['id_sewa']; ?>
                </td>

                <td>
                    <?php echo $d['id_user']; ?>
                </td>

                <td>
                    <?php echo $d['id_mobil']; ?>
                </td>

                <td>
                    <?php echo $d['jumlah_sewa']; ?>
                </td>

                <td>
                    <?php echo $d['tanggal_sewa']; ?>
                </td>

                <td>

                    <?php
                    if($d['status']=="Dipinjam"){
                    ?>

                        <span class="dipinjam">
                            Dipinjam
                        </span>

                    <?php
                    }else{
                    ?>

                        <span class="kembali">
                            Dikembalikan
                        </span>

                    <?php
                    }
                    ?>

                </td>

                <td>
                    Rp <?php echo number_format($d['denda']); ?>
                </td>

                <td>

                    <?php
                    if($d['status']=="Dipinjam"){
                    ?>

                    <a class="btn"
                    href="pengembalian.php?id=<?php echo $d['id_sewa']; ?>">

                        Kembalikan

                    </a>

                    <?php
                    }
                    ?>

                </td>

            </tr>

            <?php
            }
            ?>

        </table>

    </div>

</body>
</html>