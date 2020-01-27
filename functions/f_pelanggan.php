<?php
include '../controller/koneksi.php';
if (isset($_POST['AddPelanggan'])) {

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
   $n   = $_POST['nama'];
   $nu  = $_POST['nama_user'];
   $p   = md5($_POST['password']);
   $jk   = $_POST['jk'];
   $a   = $_POST['alamat'];
   $t   = $_POST['telepon'];
   $posisi   = $_POST['Posisi'];

   $hasil = mysqli_query($konekdb, "INSERT into users values('','$nik','$n','$nu','$p','$jk','$a','$t', '$fotopelanggan', '$posisi')");
   echo '<script>document.location="../view/v_pelanggan.php?sukses_add";</script>';
}
