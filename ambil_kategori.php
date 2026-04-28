<?php
include 'koneksi.php';

header('Content-Type: application/json');

// Cek koneksi
if (!$koneksi) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

// Ambil semua data kategori
$query = "SELECT * FROM kategori_artikel ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

// Cek apakah query berhasil
if (!$result) {
    echo json_encode(['error' => 'Query gagal: ' . mysqli_error($koneksi)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>