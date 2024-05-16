<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Ambil NIM dari parameter URL
$nim = $_GET['nim'];

// Redirect kembali ke halaman mahasiswa setelah berhasil menghapus
header("Location: mahasiswa.php");
exit;
?>
