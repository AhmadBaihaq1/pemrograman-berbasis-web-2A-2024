<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['submit'])) {
    // Ambil data dari formulir tambah
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    
    // Redirect kembali ke halaman mahasiswa setelah berhasil menambah
    header("Location: mahasiswa.php");
    exit;
}
?>
