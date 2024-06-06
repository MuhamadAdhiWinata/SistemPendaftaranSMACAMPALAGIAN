<?php
include_once("action/connection.php");
// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah sesi aktif
if (isset($_SESSION['id_admin'])) {
    header("Location: admin/dashboard.php");
} elseif(isset($_SESSION['logout'])) {
    $_SESSION['logout'] = "Anda telah logout.";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login Page SMAN 2 Campalagian" />
    <meta name="author" content="SMAN 2 Campalagian" />
    <title>Login - SMAN 2 CAMPALAGIAN</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../dist/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../dist/css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="../index.html">SMAN 2 CAMPALAGIAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="../#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../#prestasi">Prestasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="../#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="../#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Login Section-->



    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                        <?php
                            // Periksa apakah ada pesan flash
                            if (isset($_SESSION['flash_message'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['flash_message'] . '</div>';
                                unset($_SESSION['flash_message']); // Hapus pesan flash setelah ditampilkan
                            }elseif(isset($_SESSION['logout'])){
                                echo '<div class="alert alert-success" role="alert">' . $_SESSION['logout'] . '</div>';
                                unset($_SESSION['logout']); // Hapus pesan flash setelah ditampilkan
                            }elseif(isset($_GET['signout'])){
                                $pesan ="Anda telah logout.";
                                echo '<div class="alert alert-success" role="alert">' . $pesan . '</div>';
                            }
                            ?>
                            <form method="POST" action="action/do_login.php">
                                <div class="form-floating mb-3">
                                    <input class="form-control"  name="uname" id="username" type="text" placeholder="Masukkan Nama Pengguna ..." />
                                    <label for="username">Nama Pengguna</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="pass" id="password" type="password" placeholder="Ketikkan Kata Sandi" />
                                    <label for="password">Kata Sandi</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="showPassword" type="checkbox" />
                                    <label class="form-check-label" for="showPassword">Show Password</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; SMAN 2 Campalagian 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../dist/js/scripts.js"></script>
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>

</body>
</html>
