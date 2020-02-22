<?php 
include "../controller/koneksi.php";
$idKendaraan = $_GET['IdKendaraan'];
$prekotes = mysqli_query($konekdb,"SELECT * FROM kendaraan Where IdKendaraan = '$idKendaraan'");
$has  = mysqli_fetch_array($prekotes);
$nama = $has['FotoMobil'];
$tempat = "../public/img/fotomobil/" . $nama;

unlink($tempat);

$h = mysqli_query($konekdb, "DELETE FROM kendaraan WHERE IdKendaraan = '$idKendaraan'");
header("location:../view/v_kendaraan.php");
?>