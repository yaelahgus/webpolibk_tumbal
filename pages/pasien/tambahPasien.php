<?php

    require '../../config/koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tahun = date('Y');
        $bulan = date("m");

        $nama = $_POST['nama'];
        $no_ktp = $_POST['no_ktp'];
        $alamat = $_POST['alamat'];
        $password = md5($nama);
        $no_hp = $_POST['no_hp'];

        // mendapatkan data tahun dan bulan saat ini
        $searchData = "SELECT * FROM pasien";
        $query = mysqli_query($mysqli,$searchData);
        $no_rm = $tahun.$bulan.'-'.'001';

        // cek ktp tersedia ? atau tidak
        $cekNoKTP = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp'";
        $queryCekKTP = mysqli_query($mysqli,$cekNoKTP);
        // jika tersedia
        if (mysqli_num_rows($queryCekKTP)>0) {
            echo '<script>alert("No KTP telah terdaftar sebelumnya");window.location.href="../../routes/admin/pasien.php";</script>';
        }
        // jika tidak tambahkan data baru
        else{
            // jika data masih kosong maka no urut reka medis otomatis 001
            if (mysqli_num_rows($query) < 1) {
                $insertData = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";
                $queryInsert = mysqli_query($mysqli,$insertData);
                if ($queryInsert) {
                    echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../routes/admin/pasien.php";</script>';
                }
                else {
                    echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../routes/admin/pasien.php";</script>';
                }
            }
            // jika sudah ada datanya maka akan generate no urut berdasarkan no_rm data terakhir
            else {

                // mencari data terakhir di tabel pasien
                $getLastData = 'SELECT * FROM pasien ORDER BY no_rm DESC limit 1';
                $querygetData = mysqli_query($mysqli, $getLastData);

                // mengambil data terakhir di tabel pasien
                $lastData = mysqli_fetch_assoc($querygetData);

                // mengambil digit index ke 7 untuk mendapatkan no urut terbaru
                $substring = substr($lastData['no_rm'], 7);

                // konversi string ke int
                $urutanTerakhir = (int) $substring;

                // melakukan increment
                $urutanTerakhir += 1;

                // kondisi jika digit no urut satuan maka tambahkan 00 di depan nomer urut
                // jika digit no urut puluhan maka tambahakan 0 di depan nomer urut
                // jika digit no urut ratusan maka tidak perlu ditambahkan apa apa di depannya
                if($urutanTerakhir > 99){
                    $no_rm_baru = $tahun.$bulan.'-'.$urutanTerakhir;
                }
                else if ($urutanTerakhir > 9 && $urutanTerakhir < 100) {
                    $no_rm_baru = $tahun.$bulan.'-'.'0'.$urutanTerakhir;
                }
                else if($urutanTerakhir <= 9){
                    $no_rm_baru = $tahun.$bulan.'-'.'00'.$urutanTerakhir;
                }
                $insertDataBaru = "INSERT INTO pasien (nama, password, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$password', '$alamat', '$no_ktp', '$no_hp', '$no_rm_baru')";
                $queryInsertBaru = mysqli_query($mysqli,$insertDataBaru);
    
                if ($queryInsertBaru) {
                    echo '<script>alert("Pendaftaran akun berhasil");window.location.href="../../routes/admin/pasien.php";</script>';
                }
                else{
                    echo '<script>alert("Pendaftaran akun gagal");window.location.href="../../routes/admin/pasien.php";</script>';
                }
            }
        }

}
mysqli_close($mysqli);
?>