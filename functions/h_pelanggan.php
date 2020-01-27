<?php
include '../controller/koneksi.php';
$nik = $_GET['NIK'];
$h = mysqli_query($konekdb, "delete from users where NIK = '$nik'");
echo '<script>document.location="../view/v_pelanggan.php?sukses"</script>';
