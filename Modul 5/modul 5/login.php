<?php
session_start();

// Cek apakah pengguna sudah login, jika ya redirect ke halaman home
if(isset($_SESSION["username"])) {
    header("Location: home.php");
    exit;
}

// Cek apakah ada data yang dikirimkan dari form login
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi username dan password
    if($username === "Baihaqi" && $password === "Baihaqi123") {
        // Simpan username dalam session
        $_SESSION["username"] = $username;
        // Redirect ke halaman home
        header("Location: home.php");
        exit;
    } else {
        // Jika username dan password tidak cocok, tampilkan pesan error
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        <form method="post" action="">
            <input type="text" id="username" name="username" placeholder="Username"><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
