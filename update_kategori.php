<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$keterangan = $_POST['keterangan'];

$sql = "UPDATE kategori_artikel SET nama_kategori = '$nama_kategori', keterangan = '$keterangan' WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Kategori berhasil diperbarui!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>