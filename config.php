<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "PPDB_kelompok7";
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    echo "Gagal Koneksi Database";
}
?> 