<?php
include 'koneksi.php';

$id          = $_POST['id'];
$judul       = $_POST['judul'];
$isi         = $_POST['isi'];
$id_penulis  = $_POST['id_penulis'];
$id_kategori = $_POST['id_kategori'];

$sql = "UPDATE artikel SET 
        judul = '$judul', 
        isi = '$isi', 
        id_penulis = '$id_penulis', 
        id_kategori = '$id_kategori' 
        WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Artikel berhasil diperbarui!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>