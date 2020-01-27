<?php
//DELETE
include '../controller/koneksi.php';
$inikode = $_GET['KdMerk'];
$h = mysqli_query($konekdb, "delete from merk where KdMerk = '$inikode'");
echo '<script>document.location="../view/v_merk.php"</script>';
