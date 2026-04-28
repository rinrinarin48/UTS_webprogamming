<?php
include 'koneksi.php';

$id = $_GET['id'];

// Gunakan nama tabel sesuai database Rinda
$sql = "DELETE FROM kategori_artikel WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Kategori berhasil dihapus!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>