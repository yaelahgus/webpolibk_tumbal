<?php    
include("../../config/koneksi.php");    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    // Ambil nilai dari form    
    $id = $_POST["id"];    
  
    // Pertama, hapus dari detail_periksa yang terkait dengan periksa  
    $deleteDetailPeriksaQuery = "DELETE FROM detail_periksa WHERE id_periksa IN (SELECT id FROM periksa WHERE id_daftar_poli IN (SELECT id FROM daftar_poli WHERE id_pasien = $id))";    
    mysqli_query($mysqli, $deleteDetailPeriksaQuery); // Eksekusi query hapus detail_periksa  
  
    // Kemudian, hapus dari periksa yang terkait dengan daftar_poli  
    $deletePeriksaQuery = "DELETE FROM periksa WHERE id_daftar_poli IN (SELECT id FROM daftar_poli WHERE id_pasien = $id)";    
    mysqli_query($mysqli, $deletePeriksaQuery); // Eksekusi query hapus periksa  
  
    // Selanjutnya, hapus dari daftar_poli yang terkait dengan pasien  
    $deleteDaftarPoliQuery = "DELETE FROM daftar_poli WHERE id_pasien = $id";    
    mysqli_query($mysqli, $deleteDaftarPoliQuery); // Eksekusi query hapus daftar_poli    
  
    // Terakhir, hapus dari pasien  
    $query = "DELETE FROM pasien WHERE id = $id";    
    
    // Eksekusi query    
    if (mysqli_query($mysqli, $query)) {    
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda    
        echo '<script>';    
        echo 'alert("Data pasien berhasil dihapus!");';    
        echo 'window.location.href = "../../routes/admin/pasien.php";';    
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
