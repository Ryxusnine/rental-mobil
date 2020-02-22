<?php
include '../controller/koneksi.php';
if(isset($_POST['BatalPemesanan'])){
    $NoTransaksi = $_POST['NoTransaksi'];
    $kendaraan = $_POST['kendaraan'];
    $Sopir = $_POST['Sopir'];

    mysqli_query($konekdb,"UPDATE transaksi SET StatusTransaksi ='Batal' WHERE NoTransaksi ='$NoTransaksi'");

    mysqli_query($konekdb,"UPDATE kendaraan SET StatusRental ='Kosong' WHERE NoPlat ='$kendaraan'");

    mysqli_query($konekdb,"UPDATE sopir SET StatusSopir ='Free' WHERE IdSopir ='$Sopir'");
    header('location:../view/pemesanan.php?batal');
}
if(isset($_POST['ambilKendaraan'])){
    $NoTransaksi = $_POST['NoTransaksi'];
    $kendaraan = $_POST['kendaraan'];
    $Sopir = $_POST['Sopir'];
    mysqli_query($konekdb,"UPDATE transaksi SET StatusTransaksi ='Mulai' WHERE NoTransaksi ='$NoTransaksi'");

    mysqli_query($konekdb,"UPDATE kendaraan SET StatusRental ='Jalan' WHERE NoPlat ='$kendaraan'");

    mysqli_query($konekdb,"UPDATE sopir SET StatusSopir ='Riding' WHERE IdSopir ='$Sopir'");
    header('location:../view/pemesanan.php?ambil');
}
?>