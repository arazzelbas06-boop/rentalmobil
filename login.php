<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rental Mobil</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#1d3557,#457b9d);
        }

        .login-box{
            width:350px;
            background:white;
            padding:40px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:30px;
            color:#1d3557;
        }

        .input-box{
            margin-bottom:20px;
        }

        .input-box label{
            display:block;
            margin-bottom:8px;
            color:#333;
        }

        .input-box input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        .input-box input:focus{
            border-color:#457b9d;
        }

        .btn-login{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#1d3557;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn-login:hover{
            background:#457b9d;
        }

        .footer{
            text-align:center;
            margin-top:20px;
            font-size:13px;
            color:gray;
        }

    </style>

</head>
<body>

    <div class="login-box">

        <h2>Rental Mobil</h2>

        <form method="POST" action="cek_login.php">

            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

        <div class="footer">
            Sistem Rental Mobil
        </div>

    </div>

</body>
</html>