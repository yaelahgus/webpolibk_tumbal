<?php    
include("../../config/koneksi.php");    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    // Ambil nilai dari form    
    $id = $_POST["id"];    
  
    // Pertama, hapus dari daftar_poli yang terkait dengan jadwal_periksa  
    $deleteDaftarPoliQuery = "DELETE FROM daftar_poli WHERE id_jadwal IN (SELECT id FROM jadwal_periksa WHERE id_dokter = $id)";    
    mysqli_query($mysqli, $deleteDaftarPoliQuery); // Eksekusi query hapus daftar_poli    
  
    // Kemudian, hapus dari jadwal_periksa yang terkait dengan dokter  
    $deleteJadwalQuery = "DELETE FROM jadwal_periksa WHERE id_dokter = $id";    
    mysqli_query($mysqli, $deleteJadwalQuery); // Eksekusi query hapus jadwal_periksa    
  
    // Terakhir, hapus dokter  
    $query = "DELETE FROM dokter WHERE id = $id";    
    
    // Eksekusi query    
    if (mysqli_query($mysqli, $query)) {    
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda    
        echo '<script>';    
        echo 'alert("Data dokter berhasil dihapus!");';    
        echo 'window.location.href = "../../routes/admin/dokter.php";';    
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
