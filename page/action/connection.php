<?php
$host = 'localhost';
$db = 'id22353485_proyek_sistem';
$user = 'id22353485_proyekpsi';
$pass = 'Proyekpsi.123456789';

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
