<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$nim = $_GET['nim'];


?>

<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form method="post" action="proses_edit_mahasiswa.php">
            <input type="hidden" name="nim" value="<?php echo $nim; ?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $edit_mahasiswa['nama']; ?>" required><br>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $edit_mahasiswa['alamat']; ?>" required><br>
            <label for="angkatan">Angkatan:</label>
            <input type="text" id="angkatan" name="angkatan" value="<?php echo $edit_mahasiswa['angkatan']; ?>" required><br><br>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
</body>
</html>