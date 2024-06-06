<?php
$host = 'localhost';
$db = 'proyek_sistem';
$user = 'root';
$pass = '';

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
