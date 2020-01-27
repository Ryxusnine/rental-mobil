<?php
if (isset($_POST['AddType'])) {
   $kt = $_POST['IdType'];
   $nt = $_POST['NmType'];
   $km = $_POST['KdMerk'];


   include("../controller/koneksi.php");

   $hasil = mysqli_query($konekdb, "insert into type values('$kt','$nt','$km')");
   echo '<script>document.location="../view/v_type.php?sukses_add";</script>';
}
?>

<?php
//EDIT DATA
include '../controller/koneksi.php';
if (isset($_POST['edit'])) {
   $iniid = $_POST['it'];
   $ininama = $_POST['nt'];
   $inikm = $_POST['KdMerk'];
   $h = mysqli_query($konekdb, "update type set NmType ='$ininama', KdMerk = '$inikm' where IdType = '$iniid'");
   echo '<script>document.location="../view/v_type.php?edit_sukses"</script>';
}
?>
