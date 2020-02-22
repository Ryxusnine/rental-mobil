<?php 
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
$fotomobil = upload();
if (!$fotomobil) {
   return false;
}
$npl =$_POST['nopol'];
$km =$_POST['KdMerk'];
$it =$_POST['IdType'];
$hs =$_POST['HargaSewa'];

$hasil = mysqli_query($konekdb,"INSERT INTO kendaraan values('','$npl','$km','$it','Kosong','$hs','$fotomobil')");
header("location:../view/v_kendaraan.php?sukses_add");
?>