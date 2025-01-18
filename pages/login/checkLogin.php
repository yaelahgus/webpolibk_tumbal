<?php
session_start();
require '../../config/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username == "SuperAdmin" && $password == md5("123")) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['akses'] = "admin";

        header("location:../../dashboard_admin.php");
    } else {
        
    }
}
?>