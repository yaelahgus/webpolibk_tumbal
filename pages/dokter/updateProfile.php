<?php
require '../../config/koneksi.php';

// Pastikan user sudah login
$id_dokter = $_SESSION['id'] ?? null;
if (!$id_dokter) {
    header("location: ../../routes/login/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);

    // Cek apakah kolom password diisi
    if (!empty($_POST['password'])) {
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE dokter SET nama = '$nama', no_hp = '$no_hp', password = '$hashed_password' WHERE id = $id_dokter";
    } else {
        // Jika kolom password tidak diisi, hanya update nama dan no_hp
        $query = "UPDATE dokter SET nama = '$nama', no_hp = '$no_hp' WHERE id = $id_dokter";
    }

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        $_SESSION['success'] = "Profile berhasil diperbarui.";
    } else {
        $_SESSION['error'] = "Gagal memperbarui profile.";
    }
}

// Fetch current profile data
$query = "SELECT nama, no_hp FROM dokter WHERE id = $id_dokter";
$result = mysqli_query($mysqli, $query);
$dokter = mysqli_fetch_assoc($result);
?>
<!-- Content Wrapper -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Update Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Dokter</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php } ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo htmlspecialchars($dokter['nama']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo htmlspecialchars($dokter['no_hp']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru (Biarkan kosong jika tidak ingin mengubah password)</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>