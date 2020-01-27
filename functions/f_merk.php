<?php
if (isset($_POST['AddMerk'])) {
   $km = $_POST['KdMerk'];
   $nm = $_POST['NmMerk'];


   include("../controller/koneksi.php");

   $hasil = mysqli_query($konekdb, "insert into merk values('$km','$nm')");
   echo '<script>document.location="../view/v_merk.php?sukses_add";</script>';
}
?>

<?php
//EDIT DATA
include '../controller/koneksi.php';
if (isset($_POST['editMerk'])) {
   $inikode = $_POST['km'];
   $ininm = $_POST['nm'];
   $h = mysqli_query($konekdb, "update merk set NmMerk ='$ininm' where KdMerk = '$inikode'");
   echo '<script>document.location="../view/v_merk.php?edit_sukses"</script>';
}
?>
