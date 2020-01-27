<?php
//DELETE
include '../controller/koneksi.php';

$idk = $_GET['IdKendaraan'];
$prekotes = mysqli_query($konekdb, "select * from kendaraan where IdKendaraan ='$idk'");
$has = mysqli_fetch_array($prekotes);
$nama = $has['FotoMobil'];
$tempat = '../public/img/fotomobil/' . $nama;

unlink($tempat);

$h = mysqli_query($konekdb, "delete from kendaraan where IdKendaraan = '$idk'");
echo '<script>document.location="../view/v_kendaraan.php?sukses"</script>';
