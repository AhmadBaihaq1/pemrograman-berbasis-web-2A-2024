<?php
session_start();

// Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Fungsi untuk mendapatkan indeks mahasiswa berdasarkan NIM
function getStudentIndexByNIM($nim, $students) {
    foreach ($students as $index => $student) {
        if ($student['nim'] === $nim) {
            return $index;
        }
    }
    return -1;
}

// Data mahasiswa
$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();

// Tambah Mahasiswa
if (isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    $newStudent = array("nim" => $nim, "nama" => $nama, "alamat" => $alamat, "angkatan" => $angkatan);
    array_push($students, $newStudent);
    $_SESSION['students'] = $students;
}

// Edit Mahasiswa
if (isset($_POST['edit'])) {
    $nim = $_POST['nim'];
    $index = getStudentIndexByNIM($nim, $students);
    if ($index !== -1) {
        $students[$index]['nama'] = $_POST['nama'];
        $students[$index]['alamat'] = $_POST['alamat'];
        $students[$index]['angkatan'] = $_POST['angkatan'];
        $_SESSION['students'] = $students;
    }
}

// Hapus Mahasiswa
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $nim = $_GET['nim'];
    $index = getStudentIndexByNIM($nim, $students);
    if ($index !== -1) {
        array_splice($students, $index, 1);
        $_SESSION['students'] = $students;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach($students as $student): ?>
            <tr>
                <td><?php echo $student['nim']; ?></td>
                <td><?php echo $student['nama']; ?></td>
                <td><?php echo $student['alamat']; ?></td>
                <td><?php echo $student['angkatan']; ?></td>
                <td>
                    <a href="edit_mahasiswa.php?nim=<?php echo $student['nim']; ?>">Edit</a> | 
                    <a href="?action=delete&nim=<?php echo $student['nim']; ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>Tambah Mahasiswa</h2>
        <form method="post" action="">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required><br>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br>
            <label for="angkatan">Angkatan:</label>
            <input type="number" id="angkatan" name="angkatan" required><br><br>
            <input type="submit" name="tambah" value="Tambah">
        </form>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
