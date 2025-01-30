<?php 
session_start();
require "../../Controller/koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM masyarakat WHERE nik=?";
    $row = $koneksi->execute_query($sql, [$nik])->fetch_assoc();
    $nama = $row['nama'];
    $username = $row['username'];
    $telepon = $row['telp'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nik = $_GET['nik'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE masyarakat SET nama=?, telp=?, WHERE nik=?";
    $row = $koneksi->execute_query($sql, [$nama, $telepon, $nik]);
    if ($row){
        header("location:masyarakat.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Masyarakat</title>
</head>
<body>
    <h1>Edit Data Masyarakat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" value="<?=$nik?>" disabled>
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?=$nama?>" disabled>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" value="<?=$telepon?>" disabled>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?=$username?>" disabled>
        </div>
        <button type="submit">edit</button>
        <a href="masyarakat.php">Batal</a>
    </form>
</body>
</html>