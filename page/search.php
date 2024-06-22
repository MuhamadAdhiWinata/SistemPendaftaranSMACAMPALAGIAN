<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Siswa | SMA2C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cetak Kartu Siswa</h1>
        <form action="search.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">Masukkan ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="../index.html" class="btn btn-danger">Kembali</a>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $conn = mysqli_connect("localhost", "root", "", "proyek_sistem");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $result = mysqli_query($conn, "SELECT * FROM siswa WHERE ID='$id'");

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Detail Siswa</h5>
                        <p class="card-text">ID: <?php echo $row['ID']; ?></p>
                        <p class="card-text">Nama: <?php echo $row['Nama']; ?></p>
                        <p class="card-text">Email: <?php echo $row['Email']; ?></p>
                        <p class="card-text">Sekolah Asal: <?php echo $row['SekolahAsal']; ?></p>
                        <p class="card-text">Pilihan Jurusan: <?php echo $row['PilihanJurusan']; ?></p>
                        <p class="card-text">Status: <?php echo $row['is_accepted'] ? 'Diterima' : 'Belum Diterima'; ?></p>
                        <a href="../page/cetak.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Cetak Kartu</a>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alert alert-danger mt-4'>Data tidak ditemukan.</div>";
            }

            mysqli_close($conn);
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
