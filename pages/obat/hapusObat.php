<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Query untuk melakukan update data obat
    $query = "DELETE FROM obat WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda
        echo '<script>';
        echo 'alert("Data obat berhasil dihapus!");';
        echo 'window.location.href = "../../routes/admin/obat.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>