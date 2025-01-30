<?php
session_start();
require "../Controller/koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $id_pengaduan =  $_GET["id"];

    $sql = "SELECT * FROM pengaduan where id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id_pengaduan])->fetch_assoc();

}elseif($_SERVER['REQUEST_METHOD'] == "POST"){
    $tanggal = date('y-m-d');
    $id_pengaduan = $_GET["id"];
    $laporan = $_POST["laporan"];
    $foto = (isset($_FILES['foto']))?$_files['foto']['name']:"";

    $sql = "UPDATE pengaduan SET tgl_pengaduan=?, isi_laporan=?, foto=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$tanggal, $laporan, $foto, $id_pengaduan]);

    if(!empty($foto)){
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$_FILES['foto']['name']);
    }

    if($row){
        echo "<script>alert('Pengaduan baru telah berhasil disimpan!')</script>";
        header("location:aduan.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit aduan</title>
</head>
<body>
    <h1>Edit Aduan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="from-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan"><?= $row['isi_laporan'] ?></textarea>
        </div>
        <div class="form-item">
            <label for="foto">Foto Pendukung</label>
            <img src="gambar/<?= $row["foto"] ?>" alt=""><br>
            <input type="file" name="foto" id="foto"><br><br>
        </div>
        <button type="submit">Kirim laporan</button>
        <a href="aduan.php">Batal</a>
    </form>
</body>
</html>