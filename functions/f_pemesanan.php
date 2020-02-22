<?php
include '../controller/koneksi.php';
$NoTransaksi = $_POST['NoTransaksi'];
$NmPelanggan = $_POST['NmPelanggan'];
$kendaraan = $_POST['kendaraan'];
$HargaMobil = $_POST['HargaMobil'];
$tanggalPesan = $_POST['tanggalPesan_submit'];
$tanggalRental = $_POST['tanggalRental_submit'];
$tanggalSelesaiRental = $_POST['tanggalSelesaiRental_submit'];
$LamaRental = $_POST['LamaRental'];
$Sopir = $_POST['Sopir'];
$TarifSopirPerhari = $_POST['TarifSopirPerhari'];
$TotalBayar = $_POST['TotalBayar'];

mysqli_query($konekdb,"INSERT INTO transaksi(NoTransaksi,NIK,Id_Mobil,Tanggal_Pesan,Tanggal_Pinjam,Tanggal_Kembali_Rencana,LamaRental,Id_Sopir,Total_Bayar,StatusTransaksi) VALUES ('$NoTransaksi','$NmPelanggan','$kendaraan','$tanggalPesan','$tanggalRental','$tanggalSelesaiRental','$LamaRental','$Sopir','$TotalBayar','Proses')");

mysqli_query($konekdb,"UPDATE kendaraan SET StatusRental ='Dipesan' WHERE NoPlat ='$kendaraan'");

mysqli_query($konekdb,"UPDATE sopir SET StatusSopir ='Booked' WHERE IdSopir ='$Sopir'");
header("location:../view/pemesanan.php?sukses_add");
?>