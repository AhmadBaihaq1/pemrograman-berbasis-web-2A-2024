<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "dbmahasiswa";

$kon = mysqli_connect($host,$user,$password,$database);
if (!$kon) {
    die("koneksi gagal: " . mysqli_connect_error());
} 

?>