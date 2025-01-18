<?php
session_start();
require '../../config/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username == "Agusar@Root" && $password == md5("123")) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['akses'] = "admin";

        header("location:../../routes/admin/dashboard_admin.php");
    } else {
        
    }
}
?>