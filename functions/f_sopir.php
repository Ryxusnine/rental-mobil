<?php
include '../controller/koneksi.php';
if(isset($_POST['AddSpr'])){
    $idSopir = $_POST['IdSopir'];
    $NmSopir = $_POST['NmSopir'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $NoSim = $_POST['NoSim'];
    $TarifPerhari = $_POST['TarifPerhari'];

    $hasi = mysqli_query($konekdb,"INSERT INTO sopir VALUES ('','$NmSopir','$alamat','$telepon','$NoSim','$TarifPerhari','Free')");
    header("Location:../view/v_sopir.php?sukses_add");
}
if (isset($_POST['updtSpr'])) {
    $id   = $_POST['IdSopir'];
    $ns   = $_POST['NmSopir'];
    $a    = $_POST['alamat'];
    $t    = $_POST['telepon'];
    $nsim = $_POST['NoSim'];
    $th   = $_POST['TarifPerhari'];
    $h    = mysqli_query($konekdb, "UPDATE sopir set IdSopir = '$id', NmSopir ='$ns', alamat = '$a', telepon = '$t', NoSim = '$nsim', TarifPerhari = '$th' where IdSopir = '$id'");
    header("Location:../view/v_sopir.php?edit_sukses");
 }
?>