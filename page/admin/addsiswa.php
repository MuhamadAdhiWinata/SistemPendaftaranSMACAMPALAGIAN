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
        <title>Tambah Siswa | SMA2C</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="dist/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
        .centered-img {
          margin-top: 30px;
        }
      </style>
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
                        <h1 class="mt-4">Tambah Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Masukkan data siswa</li>
                        </ol>

<!-- start -->

                <form action="action/do_add_siswa.php" method="post" enctype= "multipart/form-data" class="form-control">
                      <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID">
                      </div>

                      <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                      </div>

                      <div class="form-group">
                        <label for="tempatLahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan Tempat Lahir">
                      </div>

                      <div class="form-group">
                          <label for="tanggalLahir">Tanggal Lahir:</label>
                          <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                      </div>

                      <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="nomorTelepon">Nomor Telepon:</label>
                        <input type="number" class="form-control" id="nomorTelepon" name="nomorTelepon" placeholder="Masukkan Nomor Telepon">
                      </div>

                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email">
                      </div>

                      <div class="form-group">
                        <label for="sekolahAsal">Sekolah Asal:</label>
                        <input type="text" class="form-control" id="sekolahAsal" name="sekolahAsal" placeholder="Masukkan Nama Sekolah Asal">
                      </div>

                      <div class="form-group">
                        <label for="nilaiRapor">Nilai Rapor Rata-rata:</label>
                        <input type="number" class="form-control" id="nilaiRapor" name="nilaiRapor" step="0.01" placeholder="Masukkan Nilai Rapor Rata-rata">
                      </div>

                      <div class="form-group">
                        <label for="dokumenIdentitas">Dokumen :</label>
                        <input type="file" class="form-control-file" id="dokumenIdentitas" name="dokumenIdentitas">
                      </div>


                      <div class="form-group">
                      <label for="fotoSiswa">Foto Siswa:</label>
                      <input type="file" class="form-control-file pt-2" id="fotoSiswa" name="fotoSiswa">

                      <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                          <img id="fotoPreview" width="350px" src="assets/default.png" alt="Preview Foto Siswa" class="img-fluid centered-img mb-2">
                        </div>
                      </div>

                      </div>

                    <select class="form-control" id="pilihanJurusan" name="pilihanJurusan">
                      <option value="">Pilih Jurusan...</option>
                      <option value="MIPA">Matematika Ilmu Pengetahuan Alam</option>
                      <option value="IPS">Ilmu Pengetahuan Sosial</option>
                      <option value="BINDO">Bahasa Indonesia</option>
                    </select>

                    <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary form-control mb-2">Kirim</button>
                    <button type="reset" class="btn btn-secondary form-control ">Reset</button>
                  </div>
                </form>

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

        <script>
        const fotoSiswaInput = document.getElementById('fotoSiswa');
        const fotoPreview = document.getElementById('fotoPreview');

        fotoSiswaInput.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
              fotoPreview.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
          }
        });
      </script>
    </body>
</html>
