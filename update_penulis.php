<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$user_name = $_POST['user_name'];

// Update data di database
$sql = "UPDATE penulis SET 
        nama_depan = '$nama_depan', 
        nama_belakang = '$nama_belakang', 
        user_name = '$user_name' 
        WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Data penulis berhasil diperbarui!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($koneksi)]);
}
?>