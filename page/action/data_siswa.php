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
            $conn = new mysqli("localhost", "root", "", "proyek_sistem");

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

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
                    echo "<a href='../admin/datasiswa.php' class='btn btn-primary btn-sm form-control mt-2'>Kelola</a> ";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>Tidak ada data siswa.</td></tr>";
            }
            
            
            ?>
        </tbody>
    </table>


    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Nomor Kontak</th>
                    <th>Jadwal Konsultasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM petugasppdb");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Nama'] . "</td>";
                    echo "<td>" . $row['Jabatan'] . "</td>";
                    echo "<td>" . $row['NomorKontak'] . "</td>";
                    echo "<td>" . $row['JadwalKonsultasi'] . "</td>";
                    echo "<td colspan='2'>";
                    echo "<a href='../admin/petugas.php' class='btn btn-primary btn-sm' '>Kelola</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>