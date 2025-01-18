<?php
session_start();
require '../../config/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM konsultasi WHERE id = '$id'";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $pertanyaan = mysqli_real_escape_string($mysqli, $_POST['pertanyaan']);

    $updateQuery = "UPDATE konsultasi SET subject = '$subject', pertanyaan = '$pertanyaan' WHERE id = '$id'";
    mysqli_query($mysqli, $updateQuery);

    header("Location: konsultasi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Konsultasi</title>
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <h3>Edit Konsultasi</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" class="form-control" value="<?php echo $data['subject']; ?>" required>
            </div>
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan:</label>
                <textarea name="pertanyaan" class="form-control" rows="4" required><?php echo $data['pertanyaan']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html> 