<?php
    session_start();
    require "../../Controller/koneksi.php";
    if (empty($_SESSION['username'])) {
        header("location:../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pelaporan Pengaduan</title>
</head><body>
    <h1>Selamat Datang di Aplikasi Pengaduan yarakat (PETUGAS) </h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="aduan.php">Aduan</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>