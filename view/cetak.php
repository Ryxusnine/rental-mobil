<?php
include('../controller/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="..\public\vendor\MaterialBootstrap\font\fontawesome\css\all.css">

   <link rel="stylesheet" href="..\public\vendor\MaterialBootstrap\css\bootstrap.min.css">

   <link rel="stylesheet" href="..\public\vendor\MaterialBootstrap\css\mdb.min.css">

   <link rel="stylesheet" href="..\public\vendor\MaterialBootstrap\css\addons\datatables.css">

   <link rel="stylesheet" href="..\public\css\style.css">
   <title>Document</title>

</head>

<body class="bg-light" id="print">
   <div class="container">
      <div class="bg-white rounded p-5 mt-3">
         <center>
            <h3 class="h3 mb-3">Mutiara Rental Mobil</h3>
         </center>
         <?php
         $NTR = $_GET['NTR'];
         include('../controller/koneksi.php');

         $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi WHERE NoTransaksi = '$NTR'");
         while ($row = mysqli_fetch_array($query)) {
         ?>
            <div class="row no-gutters">
               <div class="col-md-6 p-3">
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item">No. Transaksi : <?= $row['NoTransaksi'] ?></li>
                     <li class="list-group-item">Nama : [ <?= $row['NIK'] ?> ] <?= $row['nama'] ?></li>
                     <li class="list-group-item">Mobil : <?= $row['Id_Mobil'] ?> <?= $row['NmMerk'] ?> <?= $row['NmType'] ?> </li>
                     <li class="list-group-item">Nomor Telepon : <?= $row['telepon'] ?></li>
                     <li class="list-group-item">Tanggal Pesan : <?= $row['Tanggal_Pesan'] ?></li>
                     <li class="list-group-item">Tanggal Mulai Rental : <?= $row['Tanggal_Pinjam'] ?> S/d <?= $row['Tanggal_Kembali_Rencana'] ?></li>
                     <li class="list-group-item">Tanggal Kembalikan Kendaraan : <?= $row['Tanggal_Kembali_Sebenarnya'] ?></li>
                     <li class="list-group-item">Lama Rental : <?= $row['LamaRental'] ?> Hari</li>
                     <li class="list-group-item">Lama Denda : <?= $row['LamaDenda'] ?> Hari</li>
                     <li class="list-group-item">Deskripsi Kerusakan : <?= $row['Kerusakan'] ?></li>
                  </ul>
               </div>
               <div class="col-md-6 p-3">
                  <ul class="list-group list-group-flush ">
                     <li class="list-group-item">Id Sopir : <?= $row['Id_Sopir'] ?></li>
                     <li class="list-group-item">Sopir : <?= $row['NmSopir'] ?></li>
                     <li class="list-group-item">Tarif Sopir Perhari : <?= $row['TarifPerhari'] ?></li>
                     <li class="list-group-item">Biaya BBM : <?= $row['BiayaBBM'] ?></li>
                     <li class="list-group-item">Biaya Kerusakan : <?= $row['BiayaKerusakan'] ?></li>
                     <li class="list-group-item">Denda : Rp. <?= $row['Denda'] ?>,-</li>
                     <li class="list-group-item">Total Bayar : Rp. <?= $row['Total_Bayar'] ?>,-</li>
                     <li class="list-group-item">Jumlah Bayar : Rp. <?= $row['Jumlah_Bayar'] ?>,-</li>
                     <li class="list-group-item">Kembalian : Rp. <?= $row['Kembalian'] ?>,-</li>
                     <li class="list-group-item">Status Transaksi : <?= $row['StatusTransaksi'] ?></li>
                  </ul>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>

</body>
<script src="..\public\vendor\MaterialBootstrap\js\jquery-3.4.1.min.js"></script>
<script src="..\public\vendor\MaterialBootstrap\js\popper.min.js"></script>
<script src="..\public\vendor\MaterialBootstrap\js\bootstrap.min.js"></script>
<script src="..\public\vendor\MaterialBootstrap\js\mdb.min.js"></script>
<script src="..\public\vendor\MaterialBootstrap\js\addons\datatables.js"></script>
<script src="..\public\vendor\MaterialBootstrap\js\jquery.mask.min.js"></script>
<script src="..\public\vendor\SweetAlert2\dist\sweetalert2.all.min.js"></script>
<script src="..\public\js\datepicker_sett.js"></script>
<script src="..\public\js\moment.js"></script>
<script src="..\public\js\transaksi.js"></script>
<script src="..\public\js\script.js"></script>


</html>