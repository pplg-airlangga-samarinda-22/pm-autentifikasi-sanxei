<?php 
session_start();
require "../../Controller/koneksi.php";
if (empty($_SESSION['level'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pengaduan</title>
</head>
<body>
    <h1>Selamat Datang di Sistem Pengaduan Masyarakat</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="../pengaduan/pengaduan.php">Aduan</a>
        <a href="../masyarakat/masyarakat.php">Masyarakat</a>
        <?php if ($_SESSION['level'] === 'admin') {?>
        <a href="../petugas/petugas.php">Petugas</a>
        <?php } ?>
        <a href="../pengaduan/laporan.php">Laporan</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>