<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Blog - Rinda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --success: #27ae60;
            --info: #3498db;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --bg-body: #f5f7fa;
            --white: #ffffff;
            --border-color: #e0e6ed;
            --text-muted: #7f8c8d;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-body);
            color: #333;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ===== SIDEBAR ===== */
        nav {
            width: 260px;
            background: var(--white);
            padding: 0;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.08);
            z-index: 100;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .logo-area {
            padding: 25px 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-area i {
            font-size: 24px;
        }

        .logo-area strong {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        nav ul {
            list-style: none;
            padding: 15px 0;
            flex: 1;
        }

        nav li {
            margin: 0;
        }

        nav a {
            text-decoration: none;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            padding: 14px 20px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 14px;
            border-left: 3px solid transparent;
            gap: 12px;
        }

        nav a i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        nav a:hover {
            background-color: #f8f9fa;
            color: var(--info);
            border-left-color: var(--info);
            padding-left: 25px;
        }

        nav a.active {
            background-color: #e3f2fd;
            color: var(--info);
            border-left-color: var(--info);
            font-weight: 600;
        }

        /* ===== MAIN AREA ===== */
        main {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: var(--bg-body);
        }

        main::-webkit-scrollbar {
            width: 6px;
        }

        main::-webkit-scrollbar-track {
            background: transparent;
        }

        main::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        .card {
            background: var(--white);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border-color);
        }

        /* ===== HEADER & JUDUL ===== */
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h2 {
            margin: 0;
            color: var(--primary);
            font-size: 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-header h2 i {
            color: var(--info);
        }

        h2 {
            margin: 0 0 20px 0;
            color: var(--primary);
            font-size: 22px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h2 i {
            color: var(--info);
            font-size: 28px;
        }

        /* ===== BUTTONS ===== */
        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            min-height: 38px;
        }

        .btn-tambah {
            background: var(--success);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-tambah:hover {
            background: #229954;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
        }

        .btn-edit {
            background: var(--info);
            padding: 6px 12px;
            font-size: 12px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background: #2980b9;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }

        .btn-hapus {
            background: var(--danger);
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-hapus:hover {
            background: #c0392b;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .btn-batal {
            background: #95a5a6;
            padding: 10px 18px;
        }

        .btn-batal:hover {
            background: #7f8c8d;
        }

        .btn-simpan {
            background: var(--success);
            padding: 10px 20px;
            margin-right: 10px;
        }

        .btn-simpan:hover {
            background: #229954;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* ===== TABEL ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            text-align: left;
            color: #7f8c8d;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 15px;
            border-bottom: 2px solid var(--border-color);
            background-color: #f8f9fa;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            color: #2c3e50;
            font-size: 14px;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* ===== FORM ===== */
        .form-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-size: 14px;
        }

        label .required {
            color: var(--danger);
            margin-left: 3px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--white);
            font-family: inherit;
            font-size: 13px;
            color: #333;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="file"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--info);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            background: var(--white);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: 'Segoe UI', sans-serif;
        }

        input[type="file"] {
            padding: 8px 12px;
        }

        select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%233498db' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 35px;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            justify-content: center;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .form-buttons button {
            min-width: 120px;
        }

        /* ===== MODAL ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--white);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            text-align: center;
            animation: slideIn 0.3s ease;
        }

        .modal-icon {
            font-size: 48px;
            color: var(--danger);
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .modal-text {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 25px;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .modal-buttons .btn {
            flex: 1;
            margin: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            nav {
                width: 100%;
                padding: 0;
                max-height: 60px;
            }

            .logo-area {
                padding: 12px 20px;
            }

            nav ul {
                display: flex;
                flex-direction: row;
                padding: 0;
                height: 60px;
                align-items: center;
            }

            nav li {
                flex: 1;
            }

            nav a {
                padding: 12px 10px;
                justify-content: center;
                border-left: none;
                border-bottom: 3px solid transparent;
            }

            nav a:hover,
            nav a.active {
                border-left: none;
                border-bottom-color: var(--info);
            }

            main {
                padding: 15px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .modal-content {
                width: 90%;
                max-width: 350px;
            }
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 64px;
            color: #ddd;
            margin-bottom: 15px;
        }

        .empty-state p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo-area">
            <i class="fas fa-blog"></i>
            <strong>Blog CMS</strong>
        </div>
        <ul>
            <li><a onclick="muatPenulis()"><i class="fas fa-pen-fancy"></i> Kelola Penulis</a></li>
            <li><a onclick="muatKategori()"><i class="fas fa-folder"></i> Kelola Kategori</a></li>
            <li><a onclick="muatArtikel()"><i class="fas fa-newspaper"></i> Kelola Artikel</a></li>
        </ul>
    </nav>

    <main>
        <div id="konten-utama" class="card">
            <h2><i class="fas fa-home"></i> Selamat Datang, Rinda!</h2>
            <p style="margin-top: 15px; color: #7f8c8d; font-size: 15px;">Pilih menu di samping untuk mengelola penulis, kategori, dan artikel blog Anda.</p>
        </div>
    </main>

    <!-- Modal Konfirmasi Hapus -->
    <div id="hapusModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">
                <i class="fas fa-trash"></i>
            </div>
            <div class="modal-title">Hapus Data?</div>
            <div class="modal-text">Data yang dihapus tidak dapat dikembalikan.</div>
            <div class="modal-buttons">
                <button class="btn btn-batal" onclick="tutupModal()">Batal</button>
                <button class="btn btn-hapus" onclick="konfirmasiHapus()"><i class="fas fa-check"></i> Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        let hapusID = null;
        let hapusType = null;

        // ===== MODAL FUNCTIONS =====
        function bukaModalHapus(id, type) {
            hapusID = id;
            hapusType = type;
            document.getElementById('hapusModal').classList.add('show');
        }

        function tutupModal() {
            document.getElementById('hapusModal').classList.remove('show');
            hapusID = null;
            hapusType = null;
        }

        async function konfirmasiHapus() {
            if (hapusType === 'penulis') {
                await hapusPenulis(hapusID);
            } else if (hapusType === 'kategori') {
                await hapusKategori(hapusID);
            } else if (hapusType === 'artikel') {
                await hapusArtikel(hapusID);
            }
            tutupModal();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('hapusModal');
            if (event.target === modal) {
                tutupModal();
            }
        }

        // ===== PENULIS FUNCTIONS =====
        async function muatPenulis() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i><p style='margin-top: 15px; color: #7f8c8d;'>Memuat data...</p></div>";

            try {
                const response = await fetch('ambil_penulis.php');
                const data = await response.json();

                let html = `
                    <div class="table-header">
                        <h2><i class="fas fa-pen-fancy"></i> Data Penulis</h2>
                        <button class="btn btn-tambah" onclick="formTambahPenulis()"><i class="fas fa-plus"></i> Tambah Penulis</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>FOTO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>`;

                if (data.length === 0) {
                    html += `<tr><td colspan="5"><div class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada data penulis</p></div></td></tr>`;
                } else {
                    data.forEach(p => {
                        const foto = p.foto ? p.foto : 'default.png';
                        html += `
                        <tr>
                            <td><img src="uploads_penulis/${foto}" width="45" height="45" style="border-radius: 50%; object-fit: cover; border: 2px solid #e0e6ed;"></td>
                            <td><strong>${p.nama_depan} ${p.nama_belakang}</strong></td>
                            <td><code style="background: #f0f2f5; padding: 3px 6px; border-radius: 4px;">${p.user_name}</code></td>
                            <td><code style="background: #f0f2f5; padding: 3px 6px; border-radius: 4px; font-size: 12px;">••••••••</code></td>
                            <td style="text-align: center;">
                                <button class="btn btn-edit" onclick="editPenulis(${p.id})"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-hapus" onclick="bukaModalHapus(${p.id}, 'penulis')"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>`;
                    });
                }

                html += `</tbody></table>`;
                main.innerHTML = html;
            } catch (error) {
                main.innerHTML = "<div class='card' style='color: red; padding: 40px; text-align: center;'><i class='fas fa-exclamation-circle' style='font-size: 32px;'></i><p>Gagal memuat data penulis.</p></div>";
            }
        }

        function formTambahPenulis() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = `
                <h2><i class="fas fa-user-plus"></i> Tambah Penulis Baru</h2>
                <div class="form-container">
                    <form id="formPenulis" onsubmit="simpanPenulis(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Depan <span class="required">*</span></label>
                                <input type="text" name="nama_depan" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang <span class="required">*</span></label>
                                <input type="text" name="nama_belakang" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Username <span class="required">*</span></label>
                                <input type="text" name="user_name" required>
                            </div>
                            <div class="form-group">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" name="foto" accept="image/*">
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Data</button>
                            <button type="button" class="btn btn-batal" onclick="muatPenulis()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
        }

        async function simpanPenulis(event) {
            event.preventDefault();
            const form = document.getElementById('formPenulis');
            const formData = new FormData(form);

            try {
                const response = await fetch('simpan_penulis.php', {
                    method: 'POST',
                    body: formData
                });

                const hasil = await response.json();

                if (hasil.status === 'sukses') {
                    alert(hasil.pesan);
                    muatPenulis();
                } else {
                    alert("Gagal menyimpan: " + hasil.pesan);
                }
            } catch (error) {
                alert("Terjadi kesalahan sistem!");
            }
        }

        async function editPenulis(id) {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i></div>";

            const response = await fetch('ambil_satu_penulis.php?id=' + id);
            const p = await response.json();

            main.innerHTML = `
                <h2><i class="fas fa-edit"></i> Edit Penulis</h2>
                <div class="form-container">
                    <form id="formEditPenulis" onsubmit="updatePenulis(event)">
                        <input type="hidden" name="id" value="${p.id}">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Depan <span class="required">*</span></label>
                                <input type="text" name="nama_depan" value="${p.nama_depan}" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang <span class="required">*</span></label>
                                <input type="text" name="nama_belakang" value="${p.nama_belakang}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Username <span class="required">*</span></label>
                                <input type="text" name="user_name" value="${p.user_name}" required>
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            <button type="button" class="btn btn-batal" onclick="muatPenulis()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
        }

        async function updatePenulis(event) {
            event.preventDefault();
            const form = document.getElementById('formEditPenulis');
            const formData = new FormData(form);

            const response = await fetch('update_penulis.php', {
                method: 'POST',
                body: formData
            });
            const hasil = await response.json();

            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatPenulis();
            } else {
                alert("Gagal update: " + hasil.pesan);
            }
        }

        async function hapusPenulis(id) {
            try {
                const response = await fetch('hapus_penulis.php?id=' + id);
                const hasil = await response.json();

                if (hasil.status === 'sukses') {
                    alert(hasil.pesan);
                    muatPenulis();
                } else {
                    alert("Gagal hapus: " + hasil.pesan);
                }
            } catch (error) {
                alert("Error: Tidak bisa terhubung ke file hapus.");
            }
        }

        // ===== KATEGORI FUNCTIONS =====
        async function muatKategori() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i><p style='margin-top: 15px; color: #7f8c8d;'>Memuat data...</p></div>";

            try {
                const response = await fetch('ambil_kategori.php');
                const data = await response.json();

                let html = `
                    <div class="table-header">
                        <h2><i class="fas fa-folder"></i> Data Kategori Artikel</h2>
                        <button class="btn btn-tambah" onclick="formTambahKategori()"><i class="fas fa-plus"></i> Tambah Kategori</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>NAMA KATEGORI</th>
                                <th>KETERANGAN</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>`;

                if (data.length === 0) {
                    html += `<tr><td colspan="3"><div class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada kategori</p></div></td></tr>`;
                } else {
                    data.forEach(k => {
                        html += `
                        <tr>
                            <td><strong>${k.nama_kategori}</strong></td>
                            <td style="color: #7f8c8d; font-size: 13px;">${k.keterangan || '-'}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-edit" onclick="editKategori(${k.id})"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-hapus" onclick="bukaModalHapus(${k.id}, 'kategori')"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>`;
                    });
                }

                html += `</tbody></table>`;
                main.innerHTML = html;

            } catch (error) {
                main.innerHTML = "<div class='card' style='color: red; padding: 40px; text-align: center;'><i class='fas fa-exclamation-circle' style='font-size: 32px;'></i><p>Gagal memuat kategori.</p></div>";
            }
        }

        function formTambahKategori() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = `
                <h2><i class="fas fa-plus-circle"></i> Tambah Kategori Baru</h2>
                <div class="form-container" style="max-width: 500px;">
                    <form id="formKategori" onsubmit="simpanKategori(event)">
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Nama Kategori <span class="required">*</span></label>
                            <input type="text" name="nama_kategori" placeholder="Contoh: Tutorial, Tips & Trik" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Keterangan</label>
                            <textarea name="keterangan" placeholder="Deskripsi kategori..."></textarea>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Data</button>
                            <button type="button" class="btn btn-batal" onclick="muatKategori()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
        }

        async function simpanKategori(event) {
            event.preventDefault();
            const form = document.getElementById('formKategori');
            const formData = new FormData(form);

            try {
                const response = await fetch('simpan_kategori.php', {
                    method: 'POST',
                    body: formData
                });
                const hasil = await response.json();

                if (hasil.status === 'sukses') {
                    alert(hasil.pesan);
                    muatKategori();
                } else {
                    alert("Gagal: " + hasil.pesan);
                }
            } catch (error) {
                alert("Terjadi kesalahan sistem!");
            }
        }

        async function editKategori(id) {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i></div>";

            const response = await fetch('ambil_satu_kategori.php?id=' + id);
            const k = await response.json();

            main.innerHTML = `
                <h2><i class="fas fa-edit"></i> Edit Kategori</h2>
                <div class="form-container" style="max-width: 500px;">
                    <form id="formEditKategori" onsubmit="updateKategori(event)">
                        <input type="hidden" name="id" value="${k.id}">
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Nama Kategori <span class="required">*</span></label>
                            <input type="text" name="nama_kategori" value="${k.nama_kategori}" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Keterangan</label>
                            <textarea name="keterangan">${k.keterangan || ''}</textarea>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            <button type="button" class="btn btn-batal" onclick="muatKategori()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
        }

        async function updateKategori(event) {
            event.preventDefault();
            const form = document.getElementById('formEditKategori');
            const formData = new FormData(form);

            const response = await fetch('update_kategori.php', {
                method: 'POST',
                body: formData
            });
            const hasil = await response.json();

            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatKategori();
            } else {
                alert("Gagal update: " + hasil.pesan);
            }
        }

        async function hapusKategori(id) {
            const response = await fetch('hapus_kategori.php?id=' + id);
            const hasil = await response.json();

            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatKategori();
            } else {
                alert("Gagal hapus: " + hasil.pesan);
            }
        }

        // ===== ARTIKEL FUNCTIONS =====
        async function muatArtikel() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i><p style='margin-top: 15px; color: #7f8c8d;'>Memuat data...</p></div>";

            try {
                const response = await fetch('ambil_artikel.php');
                const data = await response.json();

                let html = `
                    <div class="table-header">
                        <h2><i class="fas fa-newspaper"></i> Data Artikel</h2>
                        <button class="btn btn-tambah" onclick="formTambahArtikel()"><i class="fas fa-plus"></i> Tambah Artikel</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>GAMBAR</th>
                                <th>JUDUL</th>
                                <th>KATEGORI</th>
                                <th>PENULIS</th>
                                <th>TANGGAL</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>`;

                if (data.length === 0) {
                    html += `<tr><td colspan="6"><div class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada artikel</p></div></td></tr>`;
                } else {
                    data.forEach(a => {
                        html += `
                        <tr>
                            <td>
                                ${a.gambar ? `<img src="uploads_artikel/${a.gambar}" width="50" height="50" style="object-fit: cover; border-radius: 6px;">` : '<i class="fas fa-image" style="font-size: 32px; color: #ddd;"></i>'}
                            </td>
                            <td><strong>${a.judul}</strong></td>
                            <td><span style="background: #e3f2fd; color: #01579b; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500;">${a.nama_kategori}</span></td>
                            <td>${a.nama_depan}</td>
                            <td style="color: #7f8c8d; font-size: 13px;">${a.tanggal}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-edit" onclick="editArtikel(${a.id})"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-hapus" onclick="bukaModalHapus(${a.id}, 'artikel')"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>`;
                    });
                }

                html += `</tbody></table>`;
                main.innerHTML = html;

            } catch (error) {
                console.error("Error:", error);
                main.innerHTML = "<div class='card' style='color: red; padding: 40px; text-align: center;'><i class='fas fa-exclamation-circle' style='font-size: 32px;'></i><p>Gagal memuat artikel.</p></div>";
            }
        }

        async function formTambahArtikel() {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i></div>";

            const respPenulis = await fetch('ambil_penulis.php');
            const penulis = await respPenulis.json();

            const respKategori = await fetch('ambil_kategori.php');
            const kategori = await respKategori.json();

            let html = `
                <h2><i class="fas fa-pen"></i> Tulis Artikel Baru</h2>
                <div class="form-container">
                    <form id="formArtikel" onsubmit="simpanArtikel(event)">
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Judul Artikel <span class="required">*</span></label>
                                <input type="text" name="judul" placeholder="Masukkan judul artikel..." required>
                            </div>
                        </div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Isi Artikel <span class="required">*</span></label>
                                <textarea name="isi" placeholder="Tulis isi artikel di sini..." required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Penulis <span class="required">*</span></label>
                                <select name="id_penulis" required>
                                    <option value="">-- Pilih Penulis --</option>
                                    ${penulis.map(p => `<option value="${p.id}">${p.nama_depan} ${p.nama_belakang}</option>`).join('')}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori <span class="required">*</span></label>
                                <select name="id_kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    ${kategori.map(k => `<option value="${k.id}">${k.nama_kategori}</option>`).join('')}
                                </select>
                            </div>
                        </div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" accept="image/*">
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Artikel</button>
                            <button type="button" class="btn btn-batal" onclick="muatArtikel()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
            main.innerHTML = html;
        }

        async function simpanArtikel(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('formArtikel'));

            const response = await fetch('simpan_artikel.php', {
                method: 'POST',
                body: formData
            });
            const hasil = await response.json();

            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatArtikel();
            } else {
                alert("Gagal simpan artikel: " + hasil.pesan);
            }
        }

        async function editArtikel(id) {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<div style='padding: 40px; text-align: center;'><i class='fas fa-spinner fa-spin' style='font-size: 32px; color: #3498db;'></i></div>";

            const [resArt, resPen, resKat] = await Promise.all([
                fetch('ambil_satu_artikel.php?id=' + id),
                fetch('ambil_penulis.php'),
                fetch('ambil_kategori.php')
            ]);

            const a = await resArt.json();
            const penulis = await resPen.json();
            const kategori = await resKat.json();

            main.innerHTML = `
                <h2><i class="fas fa-edit"></i> Edit Artikel</h2>
                <div class="form-container">
                    <form id="formEditArtikel" onsubmit="updateArtikel(event)">
                        <input type="hidden" name="id" value="${a.id}">
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Judul <span class="required">*</span></label>
                                <input type="text" name="judul" value="${a.judul}" required>
                            </div>
                        </div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label>Isi Artikel <span class="required">*</span></label>
                                <textarea name="isi" required>${a.isi}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Penulis <span class="required">*</span></label>
                                <select name="id_penulis" required>
                                    ${penulis.map(p => `<option value="${p.id}" ${p.id == a.id_penulis ? 'selected' : ''}>${p.nama_depan} ${p.nama_belakang}</option>`).join('')}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori <span class="required">*</span></label>
                                <select name="id_kategori" required>
                                    ${kategori.map(k => `<option value="${k.id}" ${k.id == a.id_kategori ? 'selected' : ''}>${k.nama_kategori}</option>`).join('')}
                                </select>
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-simpan"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            <button type="button" class="btn btn-batal" onclick="muatArtikel()"><i class="fas fa-times"></i> Batal</button>
                        </div>
                    </form>
                </div>
            `;
        }

        async function updateArtikel(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('formEditArtikel'));
            const response = await fetch('update_artikel.php', { method: 'POST', body: formData });
            const hasil = await response.json();
            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatArtikel();
            } else {
                alert("Gagal update: " + hasil.pesan);
            }
        }

        async function hapusArtikel(id) {
            const response = await fetch('hapus_artikel.php?id=' + id);
            const hasil = await response.json();

            if (hasil.status === 'sukses') {
                alert(hasil.pesan);
                muatArtikel();
            } else {
                alert("Gagal hapus: " + hasil.pesan);
            }
        }
    </script>

</body>

</html>
            }
        }

        async function editArtikel(id) {
            const main = document.getElementById('konten-utama');
            main.innerHTML = "<p>Memuat data...</p>";

            // Ambil data artikel, penulis, dan kategori sekaligus
            const [resArt, resPen, resKat] = await Promise.all([
                fetch('ambil_satu_artikel.php?id=' + id),
                fetch('ambil_penulis.php'),
                fetch('ambil_kategori.php')
            ]);

            const a = await resArt.json();
            const penulis = await resPen.json();
            const kategori = await resKat.json();

            main.innerHTML = `
        <h2>Edit Artikel</h2>
        <form id="formEditArtikel" onsubmit="updateArtikel(event)">
            <input type="hidden" name="id" value="${a.id}">
            <p>Judul:<br><input type="text" name="judul" value="${a.judul}" required style="width:100%"></p>
            <p>Isi:<br><textarea name="isi" rows="5" required style="width:100%">${a.isi}</textarea></p>
            
            <p>Penulis:<br>
            <select name="id_penulis">
                ${penulis.map(p => `<option value="${p.id}" ${p.id == a.id_penulis ? 'selected' : ''}>${p.nama_depan}</option>`).join('')}
            </select></p>

            <p>Kategori:<br>
            <select name="id_kategori">
                ${kategori.map(k => `<option value="${k.id}" ${k.id == a.id_kategori ? 'selected' : ''}>${k.nama_kategori}</option>`).join('')}
            </select></p>

            <button type="submit">Simpan Perubahan</button>
            <button type="button" onclick="muatArtikel()">Batal</button>
        </form>
    `;
        }
        async function updateArtikel(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('formEditArtikel'));
            const response = await fetch('update_artikel.php', { method: 'POST', body: formData });
            const hasil = await response.json();
            if (hasil.status === 'sukses') { alert(hasil.pesan); muatArtikel(); }
        }

    </script>

</body>

</html>