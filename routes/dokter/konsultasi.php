<!DOCTYPE html>

<?php
session_start();
    $username = $_SESSION['username'];
require '../../config/koneksi.php';

$idDokter = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $jawaban = mysqli_real_escape_string($mysqli, $_POST['jawaban']);

    $query = "UPDATE konsultasi SET jawaban = '$jawaban' WHERE id = '$id' AND id_dokter = '$idDokter'";
    mysqli_query($mysqli, $query);
}

$query = "SELECT k.id, k.subject, k.pertanyaan, k.jawaban, k.tgl_konsultasi, p.nama as namaPasien FROM konsultasi k INNER JOIN pasien p ON k.id_pasien = p.id WHERE k.id_dokter = '$idDokter'";
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
                            <h1 class="m-0">Pesan Konsultasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                                <li class="breadcrumb-item active">Pesan Konsultasi</li>
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
                                                <th>Pasien</th>
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
                                                    <td><?php echo $row['namaPasien']; ?></td>
                                                    <td><?php echo $row['tgl_konsultasi']; ?></td>
                                                    <td>
                                                        <?php if (empty($row['jawaban'])) { ?>
                                                            <form method="POST" action="">
                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                <textarea name="jawaban" required></textarea>
                                                                <button type="submit">Tanggapi</button>
                                                            </form>
                                                        <?php } else { ?>
                                                            <a href="edit_konsultasi.php?id=<?php echo $row['id']; ?>">Edit</a>
                                                            <a href="delete_konsultasi.php?id=<?php echo $row['id']; ?>">Hapus</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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