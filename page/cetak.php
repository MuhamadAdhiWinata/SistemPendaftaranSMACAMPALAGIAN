<?php
session_start();




$conn = new mysqli("localhost", "root", "", "proyek_sistem");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM siswa WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data siswa tidak ditemukan.";
        exit();
    }
} else {
    echo "ID siswa tidak diberikan.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cetak Kartu Pelajar</title>
  <style>
    @media print{
      #tombol {
        display: none;
      }
      
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      width: 350px;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
    }
    .card-header {
      background-color: #007BFF;
      color: #ffffff;
      padding: 15px;
      text-align: left;
      display: flex;
      align-items: center;
    }
    .card-header img {
      width: 50px;
      height: 50px;
      margin-right: 10px;
    }
    .card-header .school-info h2 {
      margin: 0;
      font-size: 18px;
    }
    .card-header .school-info p {
      margin: 0;
      font-size: 12px;
    }
    .student-photo {
      width: 100%;
      height: auto;
      border-bottom: 1px solid #dee2e6;
    }
    .student-info {
      padding: 15px;
      text-align: left;
    }
    .student-info h2 {
      background-color: #007BFF;
      color: #ffffff;
      padding: 5px;
      border-radius: 5px;
      font-size: 16px;
      text-align: center;
    }
    .student-info p {
      margin: 5px 0;
      font-size: 14px;
    }
    .print-button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: #ffffff;
      border: none;
      border-radius: 0 0 10px 10px;
      cursor: pointer;
      text-transform: uppercase;
      font-weight: bold;
      margin-top: 10px;
    }
    @media print {
      .print-button {
        display: none;
      }
    }
  </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <img src="admin/assets/default_logo_sekolah_pintar.png" alt="Logo Sekolah">
            <div class="school-info">
                <h2>SMA Negeri 2 Campalagian</h2>
                <p>Katumbangan, Kabupaten Polewali Mandar, Sulawesi Barat</p>
            </div>
        </div>
        <img class="student-photo" id="foto-siswa" src="admin/foto_siswa/<?php echo $row['FotoSiswa']; ?>" alt="Foto Siswa">
        <div class="student-info" id="print-content">
            <h2><?php echo $row['Nama']; ?></h2>
            <p><strong>Nomor:</strong> <?php echo $row['ID']; ?></p>
            <p><strong>Tanggal Lahir:</strong> <?php echo $row['TanggalLahir']; ?></p>
            <p><strong>Alamat:</strong> <?php echo $row['Alamat']; ?></p>
        </div>
        <button id="print-button" class="print-button">Cetak</button>
    </div>
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            var css = `
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .card {
                    width: 350px;
                    border: 1px solid #dee2e6;
                    border-radius: 10px;
                    background-color: #ffffff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    text-align: center;
                }
                .card-header {
                    background-color: #007BFF;
                    color: #ffffff;
                    padding: 15px;
                    text-align: left;
                    display: flex;
                    align-items: center;
                }
                .card-header img {
                    width: 50px;
                    height: 50px;
                    margin-right: 10px;
                }
                .card-header .school-info h2 {
                    margin: 0;
                    font-size: 18px;
                }
                .card-header .school-info p {
                    margin: 0;
                    font-size: 12px;
                }
                .student-photo {
                    width: 75%;
                    height: auto;
                    border-bottom: 1px solid #dee2e6;
                }
                .student-info {
                    padding: 15px;
                    text-align: left;
                }
                .student-info h2 {
                    background-color: #007BFF;
                    color: #ffffff;
                    padding: 5px;
                    border-radius: 5px;
                    font-size: 16px;
                    text-align: center;
                }
                .student-info p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                .print-button {
                    display: block;
                    width: 100%;
                    padding: 10px;
                    background-color: #007BFF;
                    color: #ffffff;
                    border: none;
                    border-radius: 0 0 10px 10px;
                    cursor: pointer;
                    text-transform: uppercase;
                    font-weight: bold;
                    margin-top: 10px;
                }
                @media print {
                    .print-button {
                        display: none;
                    }
                }
            `;
            var printContent = document.querySelector('.card').outerHTML;
            var w = window.open();
            w.document.write('<html><head><style>' + css + '</style></head><body>' + printContent + '</body></html>');
            w.document.close();
            w.print();
            w.close();
        });
    </script>
</body>
</html>