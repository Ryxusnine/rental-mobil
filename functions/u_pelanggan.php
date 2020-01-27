<?php
//EDIT DATA
include '../controller/koneksi.php';
if (isset($_POST['editP'])) {

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
   //____________________________________________________________________
   $nik  = $_POST['NIK'];
   $nm   = $_POST['nm'];
   $nmu  = $_POST['nmu'];
   $ps   = md5($_POST['ps']);
   $jk = $_POST['jk'];
   $almt = $_POST['almt'];
   $telp = $_POST['telp'];
   $foto = $_FILES['FotoPelanggan']['name'];
   $tmp = $_FILES['FotoPelanggan']['tmp_name'];

   $p = mysqli_query($konekdb, "SELECT * FROM users where NIK='$nik'");
   $r = mysqli_fetch_array($p);
   $namaHapusPhoto = $r['Foto'];
   $hapusPhoto = "../public/img/fotopelanggan/" . $namaHapusPhoto;

   $path = "../public/img/fotopelanggan/" . $foto;

   if ($foto == "") {
      mysqli_query($konekdb, "UPDATE users SET 
                              nama ='$nm', password = '$ps', 
                              JenisKelamin = '$jk', Alamat = '$almt',
                              telepon = '$telp' where NIK = '$nik'");
      header('Location: ../view/v_pelanggan.php?sukses_add');
   } else {
      $fotopelanggan = upload();
      if (!$fotopelanggan) {
         return false;
      }
      $fotohapus = mysqli_query($konekdb, "SELECT * FROM users WHERE NIK = '$nik'");
      $fotohapus = mysqli_fetch_array($fotohapus);

      $paths = "../public/img/fotopelanggan/" . $fotohapus['Foto'];

      unlink($paths);
      mysqli_query($konekdb, "UPDATE users SET 
                                nama ='$nm', password = '$ps', JenisKelamin = '$jk', Alamat = '$almt',telepon = '$telp', Foto = '$fotopelanggan' WHERE NIK = '$nik'");
      move_uploaded_file($tmp, $path);
   }
   echo '<script>document.location="../view/v_pelanggan.php?edit_sukses"</script>';
}
