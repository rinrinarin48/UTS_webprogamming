<?php
include 'koneksi.php';

$nama_kategori = $_POST['nama_kategori'];
$keterangan = $_POST['keterangan'];

// Gunakan nama tabel yang ada di database Rinda
$sql = "INSERT INTO kategori_artikel (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Kategori berhasil ditambah!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>