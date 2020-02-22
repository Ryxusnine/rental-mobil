<?php 
include "../controller/koneksi.php";
$NIK = $_GET['NIK'];
$prekotes = mysqli_query($konekdb,"SELECT * FROM users Where NIK = '$NIK'");
$has  = mysqli_fetch_array($prekotes);
$nama = $has['Foto'];
$tempat = "../public/img/fotopelanggan/" . $nama;

unlink($tempat);

$h = mysqli_query($konekdb, "DELETE FROM users WHERE NIK = '$NIK'");
header("location:../view/v_pelanggan.php");
?>