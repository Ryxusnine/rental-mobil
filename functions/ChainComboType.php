<?php
include '../controller/koneksi.php';
$KdMerk = $_GET['merek'];
?>
<label>Type</label>
<select class="custom-select browser-default" name="IdType">
   <option disabled selected>- Pilih Merk -</option>
   <?php
   $q = mysqli_query($konekdb, "SELECT * FROM type WHERE KdMerk = '$KdMerk'");
   while ($qi = mysqli_fetch_array($q)) {
      ?>
      <option value="<?= $qi['IdType'] ?>"><?= $qi['NmType'] ?></option>
   <?php } ?>
</select>