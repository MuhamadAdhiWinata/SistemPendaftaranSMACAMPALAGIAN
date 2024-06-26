<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Siswa | SMA2C</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="dist/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Administrator</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Pengaturan</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <?php
                        
                            if(isset($_GET['signout'])==1){
                                session_destroy();
                                header("Location: ../login.php?signout=1");
                                exit();
                            } 
                        
                        ?>
                        <li><a class="dropdown-item" href="?signout=1" onclick="return  confirm('Akhiri sesi dan keluar ?')">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Operasi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-folder-closed"></i></div>
                                Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="petugas.php">Petugas</a>
                                    <a class="nav-link" href="datasiswa.php">Data Siswa</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">PPDB</div>
                            <a class="nav-link" href="addsiswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-school"></i></div>
                                Pendaftaran Siswa Baru
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk sebagai:</div>
                        <?php echo $_SESSION['username'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kelola data siswa</li>
                        </ol>

                        <!DOCTYPE html>
                        <div class="container mt-5">
    <h2>Data Siswa</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Sekolah Asal</th>
                <th>Nilai Rapor</th>
                <th>Status</th>
                <th>Foto Siswa</th>
                <th>Pilihan Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sambungkan ke database
            $conn = new mysqli("localhost", "id22353485_proyekpsi", "Proyekpsi.123456789", "id22353485_proyek_sistem");

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data siswa
            $sql = "SELECT * FROM siswa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Nama'] . "</td>";
                    echo "<td>" . $row['TanggalLahir'] . "</td>";
                    echo "<td>" . $row['Alamat'] . "</td>";
                    echo "<td>" . $row['NomorTelepon'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['SekolahAsal'] . "</td>";
                    echo "<td>" . $row['NilaiRapor'] . "</td>";
                    echo "<td>" . $row['is_accepted'] . "</td>";
                    echo "<td><img src='foto_siswa/" . $row['FotoSiswa'] . "' alt='Foto Siswa' width='100'></td>";
                    echo "<td>" . $row['PilihanJurusan'] . "</td>";
                    echo "<td>";
                    echo "<a href='action/editsiswa.php?id=" . $row['ID'] . "' class='btn btn-primary btn-sm form-control mt-2'>Edit</a> ";
                    echo "<a href='action/tolak.php?id=" . $row['ID'] . "' class='btn btn-danger btn-sm form-control mt-2' onclick='return confirm(\"Apakah Anda yakin ingin menolak siswa?\")'>Tolak</a> ";
                    echo "<a href='action/ubah_status.php?id=" . $row['ID'] . "' class='btn btn-success btn-sm form-control mt-2 mb-2   '>Terima</a>";
                    echo "<a href='action/cetak_kartu.php?id=" . $row['ID'] . "' class='btn btn-info btn-sm'>Cetak Kartu Pelajar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>Tidak ada data siswa.</td></tr>";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </tbody>
    </table>
</div>


                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="distjs/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/datatables-simple-demo.js"></script>
    </body>
</html>
