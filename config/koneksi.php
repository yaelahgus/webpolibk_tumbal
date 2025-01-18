<?php 
$databaseHost = 'localhost';
$databaseName = 'dbpoliapp';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, 
    $databaseUsername, $databasePassword, $databaseName);

// Periksa koneksi
if (!$mysqli) {
    die("Koneksi gagal: " . mysqli_connect_error());
}