<?php 
include "../controller/koneksi.php";
$it = $_GET['IdType'];
$h = mysqli_query($konekdb,"DELETE from type where IdType='$it'");
header("location:../view/v_type.php");?>