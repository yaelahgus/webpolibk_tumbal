<!DOCTYPE html>

<?php
session_start();
$username = $_SESSION['username'];
require '../../config/koneksi.php';

$idPasien = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $pertanyaan = mysqli_real_escape_string($mysqli, $_POST['pertanyaan']);
    $idDokter = $_POST['id_dokter'];

    $query = "INSERT INTO konsultasi (subject, pertanyaan, tgl_konsultasi, id_pasien, id_dokter) VALUES ('$subject', '$pertanyaan', NOW(), '$idPasien', '$idDokter')";
    mysqli_query($mysqli, $query);
}

$query = "SELECT k.id, k.subject, k.pertanyaan, k.jawaban, k.tgl_konsultasi, d.nama as namaDokter FROM konsultasi k INNER JOIN dokter d ON k.id_dokter = d.id WHERE k.id_pasien = '$idPasien'";
$result = mysqli_query($mysqli, $query);
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konsultasi Medis</title>
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include ('../../components/navbar.php') ?>
        <?php include ('../../components/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Konsultasi Medis</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                                <li class="breadcrumb-item active">Konsultasi Medis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Pertanyaan</th>
                                                <th>Jawaban</th>
                                                <th>Dokter</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['subject']; ?></td>
                                                    <td><?php echo $row['pertanyaan']; ?></td>
                                                    <td><?php echo $row['jawaban']; ?></td>
                                                    <td><?php echo $row['namaDokter']; ?></td>
                                                    <td><?php echo $row['tgl_konsultasi']; ?></td>
                                                    <td>
                                                        <a href="edit_konsultasi.php?id=<?php echo $row['id']; ?>">Edit</a>
                                                        <a href="delete_konsultasi.php?id=<?php echo $row['id']; ?>">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h3>Tambah Pertanyaan</h3>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="subject">Subject:</label>
                                            <input type="text" name="subject" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan:</label>
                                            <textarea name="pertanyaan" class="form-control" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_dokter">Pilih Dokter:</label>
                                            <select name="id_dokter" class="form-control" required>
                                                <?php
                                                $queryDokter = "SELECT id, nama FROM dokter";
                                                $resultDokter = mysqli_query($mysqli, $queryDokter);
                                                while ($dokter = mysqli_fetch_assoc($resultDokter)) {
                                                    echo "<option value='{$dokter['id']}'>{$dokter['nama']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/dist/js/adminlte.min.js"></script>
</body>
</html>