<?php
// Sambungkan ke database
$conn = new mysqli("localhost", "root", "", "proyek_sistem");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap ID siswa yang akan diubah statusnya
$id = $_GET['id'];


// Query untuk mengubah status is_accepted menjadi 'Diterima'\
$sql = "DELETE FROM petugasppdb WHERE ID = $id";

if ($conn->query($sql) === TRUE) {
  header("Location: petugas.php");
  exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
