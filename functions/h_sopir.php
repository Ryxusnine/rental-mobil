<?php
include '../controller/koneksi.php';
$id = $_GET['IdSopir'];
$h = mysqli_query($konekdb, "delete from sopir where IdSopir = '$id'");
echo '<script>document.location="../view/v_sopir.php"</script>';
