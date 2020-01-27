<!-- Add -->
<?php
if (isset($_POST['AddSpr'])) {
   $id   = $_POST['IdSopir'];
   $ns   = $_POST['NmSopir'];
   $a    = $_POST['alamat'];
   $t    = $_POST['telepon'];
   $nsim = $_POST['NoSim'];
   $th   = $_POST['TarifPerhari'];

   include("../controller/koneksi.php");

   $hasil = mysqli_query($konekdb, "insert into sopir values('','$ns','$a','$t','$nsim','$th','Free')");
   echo '<script>document.location="../view/v_sopir.php?sukses_add";</script>';
}
?>
<!-- Tutup Add -->

<!-- Edit -->
<?php
include '../controller/koneksi.php';
if (isset($_POST['updtSpr'])) {
   $id   = $_POST['IdSopir'];
   $ns   = $_POST['NmSopir'];
   $a    = $_POST['alamat'];
   $t    = $_POST['telepon'];
   $nsim = $_POST['NoSim'];
   $th   = $_POST['TarifPerhari'];
   $h    = mysqli_query($konekdb, "UPDATE sopir set IdSopir = '$id', NmSopir ='$ns', alamat = '$a', telepon = '$t', NoSim = '$nsim', TarifPerhari = '$th' where IdSopir = '$id'");
   echo '<script>document.location="../view/v_sopir.php?edit_sukses"</script>';
}
?>
<!-- Tutup Edit -->