<?php
//EDIT DATA
include '../controller/koneksi.php';
function upload()
{
   $namaFile = $_FILES['FotoMobil']['name'];
   $ukuranFile = $_FILES['FotoMobil']['size'];
   $error = $_FILES['FotoMobil']['error'];
   $tmpName = $_FILES['FotoMobil']['tmp_name'];

   //Cek apakah gambar tidak di upload
   if ($error === 4) {
      echo "<script>
      alert ('Pilih gambar terlebih dahulu!');document.location='../view/v_kendaraan.php';
      </script>";
      return false;
   }
   //Cek ekstensi file
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
      alert ('Yang Anda Upload Bukan Gambar!');document.location='../view/v_kendaraan.php';
      </script>";
      return false;
   }

   //cek jka ukurannYa terlalu besar
   if ($ukuranFile > 1000000) {
      echo "<script>
      alert ('Ukuran gambar terlalu besar!');document.location='../view/v_kendaraan.php';
      </script>";
      return false;
   }

   $namaFileBaru = 'FotoMobil-';
   $namaFileBaru .= time();
   $namaFileBaru .= '-' . date('d-M-Y');
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;

   //lolos pengecekan
   move_uploaded_file($tmpName, '../public/img/fotomobil/' . $namaFileBaru);
   return $namaFileBaru;
}
// ____________________________________________________________________
$idk = $_POST['IdKendaraan'];
$HargaSewa = $_POST['HargaSewa'];
$foto = $_FILES['FotoMobil']['name'];
$tmp = $_FILES['FotoMobil']['tmp_name'];

$p = mysqli_query($konekdb, "SELECT * FROM kendaraan where NoPlat='$NoPlat'");
$r = mysqli_fetch_array($p);
$namaHapusPhoto = $r['FotoMobil'];
$hapusPhoto = "../public/img/fotomobil/" . $namaHapusPhoto;

$path = "../public/img/fotomobil/" . $foto;

if ($foto == "") {
   mysqli_query($konekdb, "UPDATE kendaraan SET 
                                    HargaSewa = '$HargaSewa'
                                    WHERE IdKendaraan = '$idk'");
   header('Location: ../view/v_kendaraan.php?sukses_add');
} else {
   $fotomobil = upload();
   if (!$fotomobil) {
      return false;
   }
   $fotohapus = mysqli_query($konekdb, "SELECT * FROM kendaraan WHERE IdKendaraan = '$idk'");
   $fotohapus = mysqli_fetch_array($fotohapus);

   $paths = "../public/img/fotomobil/" . $fotohapus['FotoMobil'];

   unlink($paths);
   mysqli_query($konekdb, "UPDATE kendaraan SET 
                              HargaSewa = '$HargaSewa',
                              FotoMobil = '$fotomobil'
                              WHERE IdKendaraan = '$idk'");
   move_uploaded_file($tmp, $path);
}
header('Location: ../view/v_kendaraan.php?sukses_add');