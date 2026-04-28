<?php
include 'koneksi.php';

header('Content-Type: application/json');

// Cek koneksi
if (!$koneksi) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

// Query mengambil data penulis
$query = "SELECT * FROM penulis ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

// Cek apakah query berhasil
if (!$result) {
    echo json_encode(['error' => 'Query gagal: ' . mysqli_error($koneksi)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    // JANGAN ganti password jadi bintang di sini
    // Biarkan data asli ($2y$10...) terkirim agar bisa diproses JavaScript
    $data[] = $row;
}

echo json_encode($data);
?>