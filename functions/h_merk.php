<?php 
include "../controller/koneksi.php";
$km = $_GET['KdMerk'];
$h = mysqli_query($konekdb,"DELETE from merk where KdMerk='$km'");
header("location:../view/v_merk.php");?>