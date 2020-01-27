<?php include '../controller/koneksi.php';
if (isset($_POST['AddKaryawan'])) {

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

   $fotokaryawan = upload();
   if (!$fotokaryawan) {
      return false;
   }

   $nik = $_POST['NIK'];
   $n   = $_POST['nama'];
   $nu  = $_POST['nama_user'];
   $p   = md5($_POST['password']);
   $JK   = $_POST['jenkel'];
   $a   = $_POST['alamat'];
   $t   = $_POST['telepon'];
   $posisi   = $_POST['Posisi'];

   $hasil = mysqli_query($konekdb, "INSERT into users values('','$nik','$n','$nu','$p','$JK','$a','$t', '$fotokaryawan', '$posisi')");
   echo '<script>document.location="../view/v_karyawan.php?sukses_add";</script>';
}
