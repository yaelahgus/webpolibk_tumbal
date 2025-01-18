<?php
session_start();
require '../../config/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; // Nama yang dimasukkan user
    $password = $_POST['password']; // Password yang dimasukkan user

    // Query untuk mencari data dokter berdasarkan nama
    $query = "SELECT * FROM dokter WHERE nama = '$username'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Verifikasi password menggunakan password_verify
        if (password_verify($password, $data['password'])) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['nama'];
            $_SESSION['id_poli'] = $data['id_poli'];
            $_SESSION['akses'] = "dokter";

            header("location:../../routes/dokter/dashboard_dokter.php");
            exit();
        } else {
            echo '<script>alert("Password salah!");location.href="../../login.php";</script>';
        }
    } else {
        echo '<script>alert("Username tidak ditemukan!");location.href="../../login.php";</script>';
        
    }
}
?>