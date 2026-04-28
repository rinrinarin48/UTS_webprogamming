<?php
// 1. Koneksi ke database
include 'koneksi.php';

// Atur agar outputnya selalu JSON
header('Content-Type: application/json');

try {
    // 2. Ambil data dari form (Pastikan 'name' di HTML sesuai)
    // Mini gunakan isset untuk jaga-jaga agar tidak error undefined
    // Ambil data berdasarkan atribut 'name' di form HTML kamu
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $user_name = $_POST['username']; // <--- PAKAI 'username' sesuai name di input
    $password_raw = $_POST['password'];

    // 3. Enkripsi password (Wajib untuk UTS)
    $password_aman = password_hash($password_raw, PASSWORD_BCRYPT);

    // 4. Logika Foto
    $nama_foto = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $folder_tujuan = "uploads_penulis/";

        // Buat folder otomatis jika belum ada
        if (!is_dir($folder_tujuan)) {
            mkdir($folder_tujuan, 0777, true);
        }

        $ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nama_foto = time() . "_" . $user_name . "." . $ekstensi;
        $jalur_simpan = $folder_tujuan . $nama_foto;

        move_uploaded_file($_FILES['foto']['tmp_name'], $jalur_simpan);
    }

    // 5. Query Insert (Gunakan $koneksi sesuai file koneksi.php kamu)
    $sql = "INSERT INTO penulis (nama_depan, nama_belakang, user_name, password, foto) 
            VALUES ('$nama_depan', '$nama_belakang', '$user_name', '$password_aman', '$nama_foto')";

    if (mysqli_query($koneksi, $sql)) {
        echo json_encode([
            'status' => 'sukses',
            'pesan' => 'Data penulis berhasil disimpan!'
        ]);
    } else {
        // Jika gagal di level database (misal kolom salah)
        echo json_encode([
            'status' => 'gagal',
            'pesan' => 'Database Error: ' . mysqli_error($koneksi)
        ]);
    }

} catch (Exception $e) {
    // Jika ada error sistem lainnya
    echo json_encode([
        'status' => 'error',
        'pesan' => $e->getMessage()
    ]);
}
?>