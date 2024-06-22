<?php
// Sambungkan ke database
$conn = new mysqli("localhost", "root", "", "proyek_sistem");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$alamat = $_POST['alamat'];
$nomorTelepon = $_POST['nomorTelepon'];
$email = $_POST['email'];
$sekolahAsal = $_POST['sekolahAsal'];
$nilaiRapor = $_POST['nilaiRapor'];
$dokumenIdentitas = $_FILES['dokumenIdentitas']['name'];
$pilihanJurusan = $_POST['pilihanJurusan'];
$is_accepted = "Ditinjau";

// Tangkap file yang diunggah
$fotoSiswaName = $_FILES['fotoSiswa']['name'];
$fotoSiswaTmpName = $_FILES['fotoSiswa']['tmp_name'];
$fotoSiswaSize = $_FILES['fotoSiswa']['size'];

// Pindahkan file yang diunggah ke direktori tujuan
$fotoSiswaPath = "../foto_siswa/" . $fotoSiswaName;
move_uploaded_file($fotoSiswaTmpName, $fotoSiswaPath);

// Tangkap file dokumen identitas yang diunggah
$dokumenIdentitasName = $_FILES['dokumenIdentitas']['name'];
$dokumenIdentitasTmpName = $_FILES['dokumenIdentitas']['tmp_name'];
$dokumenIdentitasSize = $_FILES['dokumenIdentitas']['size'];

// Pindahkan file dokumen identitas yang diunggah ke direktori tujuan
$dokumenIdentitasPath = "../dokumen_identitas/" . $dokumenIdentitasName;
move_uploaded_file($dokumenIdentitasTmpName, $dokumenIdentitasPath);

// Masukkan data ke database
$sql = "INSERT INTO siswa (ID, Nama, TempatLahir,TanggalLahir, Alamat, NomorTelepon, Email, SekolahAsal, NilaiRapor, DokumenIdentitas, FotoSiswa, PilihanJurusan, is_accepted) VALUES ('$id', '$nama', '$tempatLahir', '$tanggalLahir', '$alamat', '$nomorTelepon', '$email', '$sekolahAsal', '$nilaiRapor', '$dokumenIdentitasPath', '$fotoSiswaPath', '$pilihanJurusan', '$is_accepted')";

if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.href='../datasiswa.php';alert('Data berhasil disimpan ke database.');</script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
