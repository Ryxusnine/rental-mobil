<?php
//EDIT DATA
include '../controller/koneksi.php';
if (isset($_POST['editKaryawan'])) {

   function upload()
   {
      $namaFile = $_FILES['FotoKaryawan']['name'];
      $ukuranFile = $_FILES['FotoKaryawan']['size'];
      $error = $_FILES['FotoKaryawan']['error'];
      $tmpName = $_FILES['FotoKaryawan']['tmp_name'];

      //Cek apakah gambar tidak di upload
      if ($error === 4) {
         echo "<script>
      alert ('Pilih gambar terlebih dahulu!');document.location='../view/v_karyawan.php';
      </script>";
         return false;
      }
      //Cek ekstensi file
      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));

      if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
         echo "<script>
      alert ('Yang Anda Upload Bukan Gambar!');document.location='../view/v_karyawan.php';
      </script>";
         return false;
      }

      //cek jka ukurannYa terlalu besar
      if ($ukuranFile > 1000000) {
         echo "<script>
      alert ('Ukuran gambar terlalu besar!');document.location='../view/v_karyawan.php';
      </script>";
         return false;
      }

      $namaFileBaru = 'FotoKaryawan-';
      $namaFileBaru .= time();
      $namaFileBaru .= '-' . date('d-M-Y');
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;

      //lolos pengecekan
      move_uploaded_file($tmpName, '../public/img/fotokaryawan/' . $namaFileBaru);
      return $namaFileBaru;
   }
   //____________________________________________________________________
   $nik  = $_POST['NIK'];
   $nm   = $_POST['nm'];
   $ps   = md5($_POST['ps']);
   $jk = $_POST['jk'];
   $almt = $_POST['almt'];
   $telp = $_POST['telp'];
   $foto = $_FILES['FotoKaryawan']['name'];
   $tmp = $_FILES['FotoKaryawan']['tmp_name'];

   $p = mysqli_query($konekdb, "SELECT * FROM users where NIK='$nik'");
   $r = mysqli_fetch_array($p);
   $namaHapusPhoto = $r['Foto'];
   $hapusPhoto = "../public/img/fotokaryawan/" . $namaHapusPhoto;

   $path = "../public/img/fotokaryawan/" . $foto;

   if ($foto == "") {
      mysqli_query($konekdb, "UPDATE users SET 
                              nama ='$nm', password = '$ps', 
                              JenisKelamin = '$jk', Alamat = '$almt',
                              telepon = '$telp' where NIK = '$nik'");
      header('Location: ../view/v_karyawan.php?sukses_add');
   } else {
      $fotokaryawan = upload();
      if (!$fotokaryawan) {
         return false;
      }
      $fotohapus = mysqli_query($konekdb, "SELECT * FROM users WHERE NIK = '$nik'");
      $fotohapus = mysqli_fetch_array($fotohapus);

      $paths = "../public/img/fotokaryawan/" . $fotohapus['Foto'];

      unlink($paths);
      mysqli_query($konekdb, "UPDATE users SET 
                                nama ='$nm', password = '$ps', JenisKelamin = '$jk', Alamat = '$almt',telepon = '$telp', Foto = '$fotokaryawan' WHERE NIK = '$nik'");
      move_uploaded_file($tmp, $path);
   }
   echo '<script>document.location="../view/v_karyawan.php?edit_sukses"</script>';
}
