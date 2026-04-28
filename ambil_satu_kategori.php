<?php
include 'koneksi.php';

header('Content-Type: application/json');

if (!$koneksi) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    echo json_encode(['error' => 'ID tidak valid']);
    exit;
}

$query = "SELECT * FROM kategori_artikel WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo json_encode(['error' => 'Query gagal: ' . mysqli_error($koneksi)]);
    exit;
}

$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo json_encode(['error' => 'Data kategori tidak ditemukan']);
    exit;
}

echo json_encode($data);
?>