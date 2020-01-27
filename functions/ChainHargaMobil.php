<?php
include '../controller/koneksi.php';
$NoPlat = $_GET['mobil'];
$h = mysqli_query($konekdb, "SELECT * FROM kendaraan WHERE NoPlat = '$NoPlat'");
$r = mysqli_fetch_array($h);
?>

<label for="trf">Harga Sewa / Hari</label>
<div class="input-group ">
   <div class="input-group-prepend">
      <span class="input-group-text">Rp.</span>
   </div>
   <input type="text" name="HargaMobil" class="form-control" id="hargaSewa" value="<?= $r['HargaSewa'] ?>" readonly>
</div>