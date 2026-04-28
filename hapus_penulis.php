<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM penulis WHERE id = '$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo json_encode(["status" => "sukses", "pesan" => "Penulis berhasil dihapus!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Gagal menghapus data."]);
    }
}
?>