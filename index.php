<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public\vendor\MaterialBootstrap\font\fontawesome\css\all.css">

    <link rel="stylesheet" href="public\vendor\MaterialBootstrap\css\bootstrap.min.css">

    <link rel="stylesheet" href="public\vendor\MaterialBootstrap\css\mdb.min.css">

    <link rel="stylesheet" href="public\vendor\MaterialBootstrap\css\addons\datatables.css">

    <link rel="stylesheet" href="public\css\style.css">

    <title>LOGIN</title>
</head>

<body class="bg" style="background-image:url(foto.jpg)">

    <?Php
    if (isset($_GET['pesan'])) {
        if ($GET['pesan'] = "gagal") {
            echo '<script>
            alert("Maaf username atau password anda SALAH!!");
            document.location="index.php";
            </script>';
        } else if ($_GET['pesan'] == "Logout!") {
            echo "Logout anda berhasil";
        } else if ($_GET['pesan'] == "belum_Login") {
            echo "Anda Harus Login dlu Untuk mengakses yang lain";
        }
    }
    ?>

    <!-- Material form login -->
    <div class="iniferomna">
        <div class="card kartu">
            <h5 class="card-header warning-color white-text text-center py-4">
                <strong><B>LOGIN</B></strong>
            </h5>
            <div class="card-body px-lg-5 pt-5">
                <form method="POST" action="controller/cek_login.php">
                    <div class="md-form">
                        <input type="text" name="nama_user" id="materialLoginFormEmail" class="form-control" autofocus required>
                        <label for="materialLoginFormEmail">Username</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" id="materialLoginFormPassword" class="form-control" name="password">
                        <label for="materialLoginFormPassword">Password</label>
                    </div>
                    <button class="btn btn-outline-warning btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">LOGIN</button>
                    <center>
                        <p>Not a member?
                            <a href="#">Register</a>
                        </p>
                        <p style="color:grey">@createbyryxusnine</p>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="public\vendor\MaterialBootstrap\js\jquery-3.4.1.min.js"></script>

<script src="public\vendor\MaterialBootstrap\js\popper.min.js"></script>

<script src="public\vendor\MaterialBootstrap\js\bootstrap.min.js"></script>

<script src="public\vendor\MaterialBootstrap\js\mdb.min.js"></script>

<script src="public\vendor\MaterialBootstrap\js\addons\datatables.js"></script>

<script src="public\vendor\MaterialBootstrap\js\jquery.mask.min.js"></script>

<script src="public\vendor\SweetAlert2\dist\sweetalert2.all.min.js"></script>

<script src="public\js\datepicker_sett.js"></script>

<script src="public\js\moment.js"></script>

<script src="public\js\transaksi.js"></script>

<script src="public\js\script.js"></script>

</html>