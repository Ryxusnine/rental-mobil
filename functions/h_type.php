<?php
//DELETE
include '../controller/koneksi.php';
$iniid = $_GET['IdType'];
$h = mysqli_query($konekdb, "delete from type where IdType = '$iniid'");
echo '<script>document.location="../view/v_type.php?sukses"</script>';
