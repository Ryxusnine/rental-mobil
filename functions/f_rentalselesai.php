<?php
include("../controller/koneksi.php");
$Kendaraan = $_POST['kendaraan'];
$Tanggal_Sebenarnya = date('Y-m-d');
$JatuhTempo = $_POST['JatuhTempo'];
$deskripsiKerusakan = $_POST['deskripsiKerusakan'];
$Sopir = $_POST['Sopir'];
$BiayaBBM = $_POST['BiayaBBM'];
$BiayaKerusakan = $_POST['BiayaKerusakan'];
$Denda = $_POST['Denda'];
$jumlahBayar = $_POST['jumlahBayar'];
$Kembalian = $_POST['Kembalian'];
$StatusTransaksi = $_POST['StatusTransaksi'];


mysqli_query($konekdb, "UPDATE transaksi SET Tanggal_Kembali_Sebenarnya = '$Tanggal_Sebenarnya', LamaDenda='$JatuhTempo', Kerusakan='$deskripsiKerusakan', BiayaBBM='$BiayaBBM', BiayaKerusakan='$BiayaKerusakan', Denda='$Denda', Jumlah_Bayar='$jumlahBayar', Kembalian='$Kembalian', StatusTransaksi = 'Selesai' WHERE NoTransaksi = '$StatusTransaksi'");

mysqli_query($konekdb, "UPDATE kendaraan SET StatusRental = 'Kosong' WHERE NoPlat = '$Kendaraan'");

mysqli_query($konekdb, "UPDATE sopir SET StatusSopir = 'Free' WHERE IdSopir = '$Sopir'");
echo '<script>document.location="../view/pemesanan.php?sukses_add";</script>';
