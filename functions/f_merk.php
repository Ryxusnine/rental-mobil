<?php
include '../controller/koneksi.php';
if(isset($_POST['AddMerk'])){
    $km = $_POST['KdMerk'];
    $nm = $_POST['NmMerk'];

    $hasil = mysqli_query($konekdb,"INSERT INTO merk VALUES ('$km','$nm')");
    header("location:../view/v_merk.php?sukses_add");
}
if(isset($_POST['editMerk'])){
    $kode = $_POST['km'];
    $nama = $_POST['nm'];

    $hasil = mysqli_query($konekdb,"UPDATE merk SET NmMerk='$nama' WHERE KdMerk='$kode'");
    header("location:../view/v_merk.php?edit_sukses");
}
?>