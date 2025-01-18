<?php
session_start();
require '../../config/koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM konsultasi WHERE id = '$id'";
mysqli_query($mysqli, $query);

header("Location: konsultasi.php");
exit();
?> 