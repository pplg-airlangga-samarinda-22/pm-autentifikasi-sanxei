<?php 
session_start();
require "../../Controller/koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id'];
    $sql = "DELETE FROM petugas WHERE id_petugas=?";
    $row = $koneksi->execute_query($sql, [$id]);

    if ($row){
        header("location:petugas.php");
    }
}
?>