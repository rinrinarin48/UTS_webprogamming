<?php
include 'koneksi.php';

// Mengatur zona waktu agar tanggal akurat (WIB)
date_default_timezone_set('Asia/Jakarta');

$judul       = isset($_POST['judul']) ? $_POST['judul'] : '';
$isi         = isset($_POST['isi']) ? $_POST['isi'] : '';
$id_penulis   = isset($_POST['id_penulis']) ? $_POST['id_penulis'] : 0;
$id_kategori  = isset($_POST['id_kategori']) ? $_POST['id_kategori'] : 0;

// Tanggal otomatis (Tahun-Bulan-Hari)
$tanggal     = date('Y-m-d'); 

// --- LOGIKA UPLOAD GAMBAR ARTIKEL ---
$nama_gambar = ""; // Default jika tidak upload gambar
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $folder_tujuan = "uploads_artikel/";
    
    // Buat folder jika belum ada
    if (!is_dir($folder_tujuan)) {
        mkdir($folder_tujuan, 0777, true);
    }

    $ekstensi    = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    // Nama file unik: tgl_judul.jpg
    $nama_gambar = time() . "_" . str_replace(' ', '_', substr($judul, 0, 10)) . "." . $ekstensi;
    $jalur_simpan = $folder_tujuan . $nama_gambar;

    move_uploaded_file($_FILES['gambar']['tmp_name'], $jalur_simpan);
}

// Masukkan ke database (Sesuaikan nama kolom 'hari_tanggal' sesuai struktur tabelmu)
$sql = "INSERT INTO artikel (judul, isi, id_penulis, id_kategori, hari_tanggal, gambar) 
        VALUES ('$judul', '$isi', '$id_penulis', '$id_kategori', '$tanggal', '$nama_gambar')";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(['status' => 'sukses', 'pesan' => 'Artikel berhasil diterbitkan!']);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => 'Gagal simpan: ' . mysqli_error($koneksi)]);
}
?>