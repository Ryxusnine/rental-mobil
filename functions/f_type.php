<?php
include '../controller/koneksi.php';
if(isset($_POST['AddType'])){
    $id = $_POST['IdType'];
    $nm = $_POST['NmType'];
    $km = $_POST['KdMerk'];

    $hasil = mysqli_query($konekdb,"INSERT INTO type VALUES ('$id','$nm','$km')");
    header("location:../view/v_type.php?sukses_add");
}
if(isset($_POST['edit'])){
    $id = $_POST['it'];
    $nm = $_POST['nt'];
    $km = $_POST['KdMerk'];

    $hasil = mysqli_query($konekdb,"UPDATE type SET NmType='$nm', KdMerk='$km' WHERE IdType='$id'");
    header("location:../view/v_type.php?edit_sukses");
}
?>