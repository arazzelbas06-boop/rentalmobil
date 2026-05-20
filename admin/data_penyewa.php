<?php
include '../koneksi.php';

$data = mysqli_query($koneksi,
"SELECT * FROM user
WHERE role='penyewa'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Data Penyewa</title>

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
            padding:20px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo{
            color:white;
            font-size:24px;
            font-weight:bold;
        }

        .menu{
            display:flex;
            gap:10px;
        }

        .menu a{
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:6px;
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
            color:#1d3557;
            margin-bottom:25px;
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

        /* BADGE */

        .badge{
            background:#2a9d8f;
            color:white;
            padding:5px 10px;
            border-radius:5px;
            font-size:14px;
        }

        /* FOOTER */

        footer{
            margin-top:40px;
            background:#1d3557;
            color:white;
            text-align:center;
            padding:15px;
        }

        /* TOP BAR */

.top-bar{
    display:flex;
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

    </style>

</head>
<body>


    <!-- CONTENT -->

    <div class="container">

        <h2 class="title">
            Data Penyewa
        </h2>
        <div class="top-bar">

    <a href="../admin/admin.php" class="logout-btn">
        Keluar
    </a>

</div>

        <table>

            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>

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
                    <?php echo $d['nama']; ?>
                </td>

                <td>
                    <?php echo $d['username']; ?>
                </td>

                <td>

                    <span class="badge">
                        Penyewa
                    </span>

                </td>

            </tr>

            <?php
            }
            ?>

        </table>

    </div>
</body>
</html>