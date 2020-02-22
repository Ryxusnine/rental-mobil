<?php 
include '../controller/koneksi.php';
function upload()
{
   $namaFile = $_FILES['FotoPelanggan']['name'];
   $ukuranFile = $_FILES['FotoPelanggan']['size'];
   $error = $_FILES['FotoPelanggan']['error'];
   $tmpName = $_FILES['FotoPelanggan']['tmp_name'];

   //Cek apakah gambar tidak di upload
   if ($error === 4) {
      echo "<script>
      alert ('Pilih gambar terlebih dahulu!');document.location='../view/v_pelanggan.php';
      </script>";
      return false;
   }
   //Cek ekstensi file
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
      alert ('Yang Anda Upload Bukan Gambar!');document.location='../view/v_pelanggan.php';
      </script>";
      return false;
   }

   //cek jka ukurannYa terlalu besar
   if ($ukuranFile > 1000000) {
      echo "<script>
      alert ('Ukuran gambar terlalu besar!');document.location='../view/v_pelanggan.php';
      </script>";
      return false;
   }

   $namaFileBaru = 'FotoPelanggan-';
   $namaFileBaru .= time();
   $namaFileBaru .= '-' . date('d-M-Y');
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;

   //lolos pengecekan
   move_uploaded_file($tmpName, '../public/img/fotopelanggan/' . $namaFileBaru);
   return $namaFileBaru;
}
$fotopelanggan = upload();
if (!$fotopelanggan) {
   return false;
}
$nik = $_POST['NIK'];
$nama = $_POST['nama'];
$nama_user = $_POST['nama_user'];
$p = md5($_POST['password']);
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$posisi = $_POST['Posisi'];

$hasil = mysqli_query($konekdb,"INSERT INTO users values('','$nik','$nama','$nama_user','$p','$jk','$alamat','$telepon','$fotopelanggan','$posisi')");
header("location:../view/v_pelanggan.php?sukses_add");
?>