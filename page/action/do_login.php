<?php
include("connection.php");
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // Enkripsi password dengan MD5
    $password_md5 = md5($password);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password_md5'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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
    $conn->close();
?>
