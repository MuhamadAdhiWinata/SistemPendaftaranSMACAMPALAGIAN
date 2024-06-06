<?php
include("connection.php");
session_start(); 
// Periksa apakah form telah dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form input
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // Enkripsi password dengan MD5
    $password_md5 = md5($password);

    // Query untuk memeriksa username dan password
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password_md5'";

    // Eksekusi query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login berhasil
        $row = $result->fetch_assoc();
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['username'] = $row['username'];

        header("Location: ../admin/");
        exit();
    } else {
        $_SESSION['flash_message'] = "Username atau password salah.";
        header("Location: ../login.php");
        exit();
    }

} else {
    echo "Form tidak dikirim dengan metode POST.";
}
    // Tutup koneksi
    $conn->close();
?>
