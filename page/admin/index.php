<?php
// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah sesi aktif
if (isset($_SESSION['id_admin'])) {
    header("Location: dashboard.php");
    exit();
    
} else {
    $_SESSION['logout'] = "Anda telah logout.";
    header("Location: ../login.php");
    exit();
}
?>
