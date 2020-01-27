<?php
if (isset($_POST['BatalPemesanan'])) {
   include("../controller/koneksi.php");
   $NoTransaksi = $_POST['NoTransaksi'];
   $Kendaraan = $_POST['kendaraan'];
   $Sopir = $_POST['Sopir'];

   mysqli_query($konekdb, "UPDATE transaksi SET StatusTransaksi = 'Batal' WHERE NoTransaksi = '$NoTransaksi'");

   mysqli_query($konekdb, "UPDATE kendaraan SET StatusRental = 'Kosong' WHERE NoPlat = '$Kendaraan'");

   mysqli_query($konekdb, "UPDATE sopir SET StatusSopir = 'Free' WHERE IdSopir = '$Sopir'");

   echo '<script>document.location="../view/pemesanan.php?batal";</script>';
}

if (isset($_POST['ambilKendaraan'])) {
   include("../controller/koneksi.php");
   $NoTransaksi = $_POST['NoTransaksi'];
   $Kendaraan = $_POST['kendaraan'];
   $Sopir = $_POST['Sopir'];

   mysqli_query($konekdb, "UPDATE transaksi SET StatusTransaksi = 'Mulai' WHERE NoTransaksi = '$NoTransaksi'");

   mysqli_query($konekdb, "UPDATE kendaraan SET StatusRental = 'Jalan' WHERE NoPlat = '$Kendaraan'");

   mysqli_query($konekdb, "UPDATE sopir SET StatusSopir = 'Riding' WHERE IdSopir = '$Sopir'");

   echo '<script>document.location="../view/pemesanan.php?ambil";</script>';
}
