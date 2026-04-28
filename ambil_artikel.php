<?php
include 'koneksi.php';

header('Content-Type: application/json');

// Cek koneksi
if (!$koneksi) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

$query = "SELECT 
            artikel.*, 
            penulis.nama_depan, 
            penulis.nama_belakang, 
            kategori_artikel.nama_kategori 
          FROM artikel 
          LEFT JOIN penulis ON artikel.id_penulis = penulis.id
          LEFT JOIN kategori_artikel ON artikel.id_kategori = kategori_artikel.id
          ORDER BY artikel.id DESC";

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