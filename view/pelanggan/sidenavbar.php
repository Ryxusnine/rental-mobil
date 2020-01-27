<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="..\..\public\vendor\MaterialBootstrap\font\fontawesome\css\all.css">

   <link rel="stylesheet" href="..\..\public\vendor\MaterialBootstrap\css\bootstrap.min.css">

   <link rel="stylesheet" href="..\..\public\vendor\MaterialBootstrap\css\mdb.min.css">

   <link rel="stylesheet" href="..\..\public\vendor\MaterialBootstrap\css\addons\datatables.css">

   <link rel="stylesheet" href="..\..\public\css\style.css">
   <title>Document</title>

</head>

<body class="grey lighten-3">
   <div class="row no-gutters">
      <div class="col-md-2">
         <div class="vertical">
            <!-- Sidebar -->
            <ul class="purple darken-4">
               <br>

               <?php if ($_SESSION['Login']['Posisi'] == 1) : ?>
                  <img src="https://localhost/RentalMobil/public/img/logo/<?= $_SESSION['Login']['Foto'] ?>" alt="admin">
               <?php elseif ($_SESSION['Login']['Posisi'] == 2) : ?>
                  <img src="https://localhost/RentalMobil/public/img/fotokaryawan/<?= $_SESSION['Login']['Foto'] ?>" alt="karyawan">
               <?php else : ?>
                  <img src="https://localhost/RentalMobil/public/img/fotopelanggan/<?= $_SESSION['Login']['Foto'] ?>" alt="pelanggan">
               <?php endif; ?>

               <span class="navbar-text text-white text-center mb-3">
                  Selamat Datang, <br> <span class="badge badge-warning p-2 shadow-none" style="color:black!important; font-size:12px"><?= $_SESSION['Login']['nama_user'] ?>
                  </span></span>

               <li><a href="utama"><i class="fas fa-home"></i> Halaman Utama</a></li>
               <li><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
               <li><a href="v_kendaraan"><i class="fas fa-car"></i> Data Kendaraan</a></li>
               <li><a href="v_pelanggan"><i class="fas fa-user"></i> Data Akun</a></li>
               <li><a href="v_sopir"><i class="fas fa-user-tie"></i> Data Sopir</a></li>
               <li><a href="transaksi"><i class="fas fa-donate"></i> Transaksi</a></li>

               <a href="../../controller/logout.php" class="tombol-logout text-white shadow rounded-pill mb-4 waves-effect waves-light text-center"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </ul>
         </div>
      </div>
      <!-- end Sidebar -->
      <div class="col-md-10" style="overflow-y:scroll;height:100vh">
         <div class="navbar shadow-sm bg-white sticky-top">
            <div class="h5">MUTIARA RENTAL MOBIL</div>
            <div class="search-box">
               <input type="text" name="" class="search-txt" placeholder="Type to search">&nbsp;
               <a class="search-btn" href="#">
                  <i class="fas fa-search"></i></a>
            </div>
         </div>