<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style1.css">
      
</head>
<body>
    <div class="container">
    <h2>Selamat Datang!</h2>
    <p class="welcome-text">Halo, <?php echo $username; ?>!</p>
    <a href="Mahasiswa.php" class="link" style="background-color: #28a745;">Lihat Data Mahasiswa</a>
    <a href="logout.php" class="link">Logout</a>
    </div>
</body>
</html>

