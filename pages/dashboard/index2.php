<?php
require '../../config/koneksi.php';
$id_poli = $_SESSION['id_poli'];

$query_poli = "SELECT nama_poli FROM poli WHERE id = $id_poli";
$result = mysqli_query($mysqli, $query_poli);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    $nama_poli = $row['nama_poli'];
} else {
    $nama_poli = "Tidak dapat mendapatkan nama poli";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" type="image/png" href="../../assets/images/logo1.png">
    <title>Dokter Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Increased height for the overlay */
        .overlay {
            background-color: #615EFC;
            color: black;
            padding: 50px;
            text-align: center;
            min-height: 300px;
            margin: 50px;
        }

        h2 {
            text-align: center;
            padding-top: 30;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <section class="Header">
        <div class="overlay">
            <h2 class="title" style="text-bold font-family">Selamat Datang Di Poliklinik Dian Nuswantoro</h2>
            <p>Sistem temu janji berbasis web yang dirancang untuk mendukung layanan kesehatan di Poliklinik Dian Nuswantoro, merupakan fasilitas kesehatan warga Universitas Dian Nuswantoro (Udinus).</p>
        </div>
    </section>

    <!-- Link to Bootstrap JS and other necessary scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>