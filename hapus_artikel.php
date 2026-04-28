<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM artikel WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Artikel berhasil dihapus!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>