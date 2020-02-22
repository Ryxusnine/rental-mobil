<?php
session_start();
include "koneksi.php";
$user = $_POST['nama_user'];
$pass = md5($_POST['password']);

$data = mysqli_query($konekdb, "SELECT * FROM view_users WHERE nama_user = '$user' and password = '$pass' ");
$cek = mysqli_num_rows($data);
$hasil = mysqli_fetch_assoc($data);

if ($cek > 0) {
    $_SESSION['Login'] = [
        'id' => $hasil['id'],
        'NIK' => $hasil['NIK'],
        'nama_user' => $hasil['nama'],
        'Posisi' => $hasil['Posisi'],
        'Foto' => $hasil['Foto']
    ];

    //Pengecekan multiuser
    if ($_SESSION['Login']['Posisi'] == 1 or $_SESSION['Login']['Posisi'] == 2) {
        header("location:../view/dashboard");
    } else if ($_SESSION['Login']['Posisi'] == 3) {
        header("location:../view/dashboard");
    }
} else {
    echo '<script>alert("MAAF PASSWORD ANDA SALAH");document.location="../index.php";</script>';
}
