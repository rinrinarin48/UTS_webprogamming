<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Blog (CMS)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- CSS DASAR & LAYOUT (Sesuai Modul) --- */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #eef2f7;
            color: #1f2937;
        }

        .topbar {
            background: #018790;
            color: white;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .topbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon-box {
            background: white;
            color: #018790;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-weight: 800;
        }

        .wrapper {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        .sidebar {
            width: 250px;
            background: #005461;
            color: white;
            padding: 24px 15px;
        }

        .sidebar-label {
            font-size: 11px;
            text-transform: uppercase;
            opacity: 0.6;
            margin-bottom: 15px;
            padding-left: 15px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            color: white;
            padding: 12px 15px;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: #00B7B5;
        }

        .main-content {
            flex: 1;
            padding: 25px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* --- TABEL --- */
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #f8fafc;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #edf2f7;
            font-size: 13px;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        /* --- BUTTONS --- */
        .btn {
            border: 0;
            border-radius: 8px;
            padding: 8px 14px;
            cursor: pointer;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-tambah {
            background: #018790;
            color: white;
        }

        .btn-edit {
            background: #1ea151;
            color: white;
            font-size: 12px;
        }

        .btn-hapus {
            background: #dc2626;
            color: white;
            font-size: 12px;
        }

        .btn-batal {
            background: #6b7280;
            color: white;
        }

        .btn-simpan {
            background: #018790;
            color: white;
        }

        /* --- FORM & INPUT --- */
        .form-box {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* --- BADGES & IMAGES --- */
        .username-badge {
            background: #e1f5fe;
            color: #01579b;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-kategori {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            color: white;
            background: #94a3b8;
        }

        .badge-tutorial {
            background: #3b82f6;
        }

        .badge-database {
            background: #10b981;
        }

        /* --- MODAL HAPUS --- */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 100;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            max-width: 400px;
            position: relative;
            width: 95%;
        }

        .form-modal-content {
            max-width: 700px;
            text-align: left;
            max-height: 90vh;
            overflow-y: auto;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #94a3b8;
            line-height: 1;
        }
        .close-btn:hover { color: #1e293b; }

        .modal-icon-wrap {
            font-size: 50px;
            color: #dc2626;
            margin-bottom: 15px;
        }

        .modal-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        /* --- LOADING & EMPTY --- */
        .loading-state {
            text-align: center;
            padding: 50px;
            color: #018790;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
        }

        /* --- TOAST NOTIFICATION --- */
        #toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 300px;
            max-width: 380px;
            padding: 14px 18px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            pointer-events: all;
            animation: slideInRight 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            border-left: 5px solid #018790;
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            overflow: hidden;
            position: relative;
        }

        .toast.sukses {
            border-left-color: #16a34a;
        }

        .toast.error {
            border-left-color: #dc2626;
        }

        .toast.info {
            border-left-color: #018790;
        }

        .toast-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .toast.sukses .toast-icon {
            color: #16a34a;
        }

        .toast.error .toast-icon {
            color: #dc2626;
        }

        .toast.info .toast-icon {
            color: #018790;
        }

        .toast-body {
            flex: 1;
        }

        .toast-title {
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 2px;
        }

        .toast.sukses .toast-title {
            color: #15803d;
        }

        .toast.error .toast-title {
            color: #b91c1c;
        }

        .toast.info .toast-title {
            color: #005461;
        }

        .toast-close {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            color: #9ca3af;
            padding: 0;
            line-height: 1;
            flex-shrink: 0;
        }

        .toast-close:hover {
            color: #374151;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            border-radius: 0 0 0 12px;
            animation: toastProgress 3s linear forwards;
        }

        .toast.sukses .toast-progress {
            background: #16a34a;
        }

        .toast.error .toast-progress {
            background: #dc2626;
        }

        .toast.info .toast-progress {
            background: #018790;
        }

        .toast.slide-out {
            animation: slideOutRight 0.3s ease-in forwards;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(120%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOutRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(120%);
            }
        }

        @keyframes toastProgress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }
    </style>
</head>

<body>

    <!-- TOAST CONTAINER -->
    <div id="toast-container"></div>

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-logo">
            <div class="icon-box"><span style="font-weight:800;font-size:17px;font-style:italic;">b</span></div>
            <div class="brand-text">
                <strong>Sistem Manajemen Blog (CMS)</strong>
                <span>Blog Artikel</span>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-label">Menu Utama</div>
            <ul>
                <li><a id="nav-penulis" onclick="muatPenulis()"><i class="fas fa-user-circle"></i> Kelola Penulis</a>
                </li>
                <li><a id="nav-artikel" onclick="muatArtikel()"><i class="fas fa-file-alt"></i> Kelola Artikel</a></li>
                <li><a id="nav-kategori" onclick="muatKategori()"><i class="fas fa-folder"></i> Kelola Kategori</a></li>
            </ul>
        </div>

        <!-- MAIN -->
        <div class="main-content">
            <div id="konten-utama" class="card">
                <div style="padding: 30px 0; color: #7f8c8d; text-align:center;">
                    <i class="fas fa-home" style="font-size:36px; color:#ccc; margin-bottom:12px; display:block;"></i>
                    <strong style="color:#555; font-size:15px;">Selamat datang di CMS Blog</strong>
                    <p style="margin-top:8px; font-size:13px;">Pilih menu di sebelah kiri untuk mulai mengelola konten.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS -->
    <div id="hapusModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon-wrap">
                <i class="fas fa-trash"></i>
            </div>
            <div class="modal-title">Hapus data ini?</div>
            <div class="modal-text">Data yang dihapus tidak dapat dikembalikan.</div>
            <div class="modal-buttons">
                <button class="btn btn-batal" onclick="tutupModal()">Batal</button>
                <button class="btn btn-hapus" onclick="konfirmasiHapus()">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <!-- MODAL FORM -->
    <div id="formModal" class="modal">
        <div class="modal-content form-modal-content">
            <span class="close-btn" onclick="tutupFormModal()">&times;</span>
            <div id="formModalBody"></div>
        </div>
    </div>

    <script>
        let hapusID = null;
        let hapusType = null;

        /* ── TOAST NOTIFICATION ── */
        function tampilNotif(pesan, tipe = 'info') {
            const container = document.getElementById('toast-container');
            const iconMap = {
                sukses: 'fa-circle-check',
                error: 'fa-circle-xmark',
                info: 'fa-circle-info'
            };
            const titleMap = {
                sukses: 'Berhasil!',
                error: 'Gagal!',
                info: 'Informasi'
            };

            const toast = document.createElement('div');
            toast.className = `toast ${tipe}`;
            toast.innerHTML = `
                <i class="fas ${iconMap[tipe] || 'fa-circle-info'} toast-icon"></i>
                <div class="toast-body">
                    <div class="toast-title">${titleMap[tipe] || 'Info'}</div>
                    <div>${pesan}</div>
                </div>
                <button class="toast-close" onclick="tutupToast(this.parentElement)">&#x2715;</button>
                <div class="toast-progress"></div>
            `;

            container.appendChild(toast);

            // Auto-remove setelah 3 detik
            setTimeout(() => tutupToast(toast), 3000);
        }

        function tutupToast(toast) {
            if (!toast || !toast.parentElement) return;
            toast.classList.add('slide-out');
            toast.addEventListener('animationend', () => toast.remove(), { once: true });
        }

        /* ── AKTIFKAN NAV ── */
        function setActiveNav(id) {
            document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
            const el = document.getElementById(id);
            if (el) el.classList.add('active');
        }

        /* ── MODAL ── */
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

        function bukaFormModal(html) {
            document.getElementById('formModalBody').innerHTML = html;
            document.getElementById('formModal').classList.add('show');
        }

        function tutupFormModal() {
            document.getElementById('formModal').classList.remove('show');
            document.getElementById('formModalBody').innerHTML = '';
        }

        async function konfirmasiHapus() {
            if (hapusType === 'penulis') await hapusPenulis(hapusID);
            if (hapusType === 'kategori') await hapusKategori(hapusID);
            if (hapusType === 'artikel') await hapusArtikel(hapusID);
            tutupModal();
        }

        window.onclick = e => {
            if (e.target === document.getElementById('hapusModal')) tutupModal();
            if (e.target === document.getElementById('formModal')) tutupFormModal();
        };

        /* ── HELPER BADGE ── */
        function badgeKategori(nama) {
            const n = (nama || '').toLowerCase();
            let cls = 'badge-default';
            if (n === 'tutorial') cls = 'badge-tutorial';
            else if (n === 'database') cls = 'badge-database';
            else if (n.includes('web design')) cls = 'badge-webdesign';
            return `<span class="badge-kategori ${cls}">${nama}</span>`;
        }

        /* ── HELPER FORMAT TANGGAL ── */
        function formatTanggal(tanggalStr) {
            if (!tanggalStr) return '-';
            const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const date = new Date(tanggalStr + 'T00:00:00');
            const hari = String(date.getDate()).padStart(2, '0');
            const bulanIdx = date.getMonth();
            const tahun = date.getFullYear();
            return `${hari} ${bulan[bulanIdx]} ${tahun}`;
        }

        /* ════════════════════════════════════
            PENULIS
        ════════════════════════════════════ */
        async function muatPenulis() {
            setActiveNav('nav-penulis');
            const main = document.getElementById('konten-utama');
            main.innerHTML = `<div class="loading-state"><i class="fas fa-spinner fa-spin"></i><p>Memuat data...</p></div>`;

            try {
                const data = await fetch('ambil_penulis.php').then(r => r.json());

                let rows = '';
                if (data.length === 0) {
                    rows = `<tr><td colspan="5"><div class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada data penulis</p></div></td></tr>`;
                } else {
                    data.forEach(p => {
                        // Logika Foto
                        const namaFile = (p.foto && p.foto !== "") ? p.foto : "default.png";
                        const pathFoto = `uploads_penulis/${namaFile}`;

                        const fotoTag = `<img src="${pathFoto}" 
                             width="42" height="42" 
                             style="border-radius:5px;object-fit:cover;border:1px solid #ddd;" 
                             onerror="this.src='uploads_penulis/default.png'">`;

                        // LOGIKA PASSWORD: Menampilkan potongan hash (enkripsi) dari database
                        // Ini yang membuat tampilannya berbeda dari titik-titik biasa
                        const passwordTampil = p.password ? p.password.substring(0, 15) + "..." : "no_hash";

                        rows += `
                <tr>
                    <td>${fotoTag}</td>
                    <td><strong>${p.nama_depan} ${p.nama_belakang}</strong></td>
                    <td><span class="username-badge">${p.user_name || p.username}</span></td>
                    <td>
                        <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 6px; color: #475569; font-size: 14px; letter-spacing: 2px;">
                        ●●${p.password ? p.password.substring(0, 10) : ''}...
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-edit" onclick="editPenulis(${p.id})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-hapus" onclick="bukaModalHapus(${p.id},'penulis')"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>`;
                    });
                }

                main.innerHTML = `
            <div class="table-header">
                <h2>Data Penulis</h2>
                <button class="btn btn-tambah" onclick="formTambahPenulis()">+ Tambah Penulis</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>FOTO</th><th>NAMA</th><th>USERNAME</th><th>PASSWORD</th><th>AKSI</th>
                    </tr>
                </thead>
                <tbody>${rows}</tbody>
            </table>`;
            } catch (e) {
                main.innerHTML = `<div class="empty-state"><i class="fas fa-exclamation-circle" style="color:#e74c3c;"></i><p>Gagal memuat data penulis.</p></div>`;
            }
        }

        function formTambahPenulis() {
            const html = `
        <div class="form-box" style="margin:0; max-width:100%;">
            <h2 style="margin-top:0;">Tambah Penulis</h2>
            <form id="formPenulis" onsubmit="simpanPenulis(event)">
                <div class="form-row-2">
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="nama_depan" placeholder="Contoh: Rinda" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="nama_belakang" placeholder="Contoh: Agit" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username unik..." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password..." required>
                </div>
                <div class="form-group">
                    <label>Foto Profil</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                    <button type="submit" class="btn btn-simpan">Simpan Data</button>
                </div>
            </form>
        </div>`;
            bukaFormModal(html);
        }
        async function simpanPenulis(event) {
            event.preventDefault();

            // Ambil form berdasarkan element yang memicu event
            const formElement = event.target;
            const dataForm = new FormData(formElement);

            try {
                const response = await fetch('simpan_penulis.php', {
                    method: 'POST',
                    body: dataForm
                });

                // Cek apakah response dari server oke (status 200)
                if (!response.ok) throw new Error("Gagal terhubung ke server");

                const hasil = await response.json();

                if (hasil.status === 'sukses') {
                    tampilNotif(hasil.pesan, 'sukses');
                    tutupFormModal();
                    muatPenulis(); // Refresh tabel setelah simpan
                } else {
                    tampilNotif("Gagal: " + hasil.pesan, 'error');
                }
            } catch (error) {
                console.error("Detail Error:", error);
                tampilNotif("Terjadi kesalahan sistem! Pastikan file simpan_penulis.php sudah benar.", 'error');
            }
        }

        async function editPenulis(id) {
            const p = await fetch('ambil_satu_penulis.php?id=' + id).then(r => r.json());

            const html = `
                <div class="form-box" style="margin:0; max-width:100%;">
                    <h2 style="margin-top:0;">Edit Penulis</h2>
                    <form id="formEditPenulis" onsubmit="updatePenulis(event)">
                        <input type="hidden" name="id" value="${p.id}">
                        <div class="form-row-2">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" name="nama_depan" value="${p.nama_depan}" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" name="nama_belakang" value="${p.nama_belakang}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user_name" value="${p.user_name}" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru (kosongkan jika tidak diganti)</label>
                            <input type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Foto Profil (kosongkan jika tidak diganti)</label>
                            <input type="file" name="foto" accept="image/*">
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                            <button type="submit" class="btn btn-simpan">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>`;
            bukaFormModal(html);
        }

        async function updatePenulis(event) {
            event.preventDefault();
            const res = await fetch('update_penulis.php', { method: 'POST', body: new FormData(document.getElementById('formEditPenulis')) });
            const hasil = await res.json();
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); tutupFormModal(); muatPenulis(); }
            else tampilNotif("Gagal update: " + hasil.pesan, 'error');
        }

        async function hapusPenulis(id) {
            try {
                const hasil = await fetch('hapus_penulis.php?id=' + id).then(r => r.json());
                if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); muatPenulis(); }
                else tampilNotif("Gagal hapus: " + hasil.pesan, 'error');
            } catch { tampilNotif("Error: Tidak bisa terhubung ke file hapus.", 'error'); }
        }

        /* ════════════════════════════════════
            ARTIKEL
        ════════════════════════════════════ */
        async function muatArtikel() {
            setActiveNav('nav-artikel');
            const main = document.getElementById('konten-utama');
            main.innerHTML = `<div class="loading-state"><i class="fas fa-spinner fa-spin"></i><p>Memuat data artikel...</p></div>`;

            try {
                const response = await fetch('ambil_artikel.php');

                if (!response.ok) {
                    throw new Error('Gagal terhubung ke server');
                }

                const data = await response.json();

                // Cek apakah ada error di response JSON
                if (data.error) {
                    throw new Error(data.error);
                }

                let rows = '';
                if (data.length === 0) {
                    rows = `<tr><td colspan="6"><div class="empty-state"><i class="fas fa-newspaper"></i><p>Belum ada artikel</p></div></td></tr>`;
                } else {
                    data.forEach(a => {
                        // 1. Logika Gambar Artikel
                        const namaGambar = (a.gambar && a.gambar !== "") ? a.gambar : "default.png";
                        const pathGambar = `uploads_artikel/${namaGambar}`;

                        const gambarTag = `<img src="${pathGambar}" 
                                     width="50" height="50" 
                                     style="border-radius:8px;object-fit:cover;border:1px solid #eee;" 
                                     onerror="this.src='uploads_penulis/default.png'">`;

                        // 2. Logika Nama Penulis (Biar nggak muncul undefined)
                        const namaPenulis = a.nama_depan ? `${a.nama_depan} ${a.nama_belakang}` : 'Penulis Anonim';

                        // 3. Logika Tanggal (Format tanggal ke Bahasa Indonesia)
                        const tanggalTampil = formatTanggal(a.hari_tanggal);

                        // 4. Badge Kategori
                        const badgeClass = a.nama_kategori && a.nama_kategori.toLowerCase() === 'tutorial' ? 'badge-tutorial' : 'badge-database';

                        rows += `
                <tr>
                    <td>${gambarTag}</td>
                    <td><strong>${a.judul}</strong></td>
                    <td><span class="badge-kategori ${badgeClass}">${a.nama_kategori || 'Umum'}</span></td>
                    <td>${namaPenulis}</td>
                    <td style="font-size:11px; color:#64748b;">${tanggalTampil}</td>
                    <td>
                        <button class="btn btn-edit" onclick="editArtikel(${a.id})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-hapus" onclick="bukaModalHapus(${a.id},'artikel')"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>`;
                    });
                }

                main.innerHTML = `
            <div class="table-header">
                <h2>Data Artikel</h2>
                <button class="btn btn-tambah" onclick="formTambahArtikel()">+ Tambah Artikel</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>GAMBAR</th><th>JUDUL</th><th>KATEGORI</th><th>PENULIS</th><th>TANGGAL</th><th>AKSI</th>
                    </tr>
                </thead>
                <tbody>${rows}</tbody>
            </table>`;
            } catch (e) {
                console.error('Error:', e);
                main.innerHTML = `<div class="empty-state"><i class="fas fa-exclamation-circle" style="color:#e74c3c;"></i><p>Gagal memuat data artikel: ${e.message}</p></div>`;
            }
        }
        async function formTambahArtikel() {
            try {
                const [penulis, kategori] = await Promise.all([
                    fetch('ambil_penulis.php').then(r => r.json()),
                    fetch('ambil_kategori.php').then(r => r.json())
                ]);

                const html = `
            <div class="form-box" style="margin:0; max-width:100%;">
                <h2 style="margin-top:0;">Tambah Artikel</h2>
                <form id="formArtikel" onsubmit="simpanArtikel(event)">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" placeholder="Masukkan judul artikel..." required>
                    </div>
                    
                    <div class="form-row-2">
                        <div class="form-group">
                            <label>Penulis</label>
                            <select name="id_penulis" required>
                                <option value="">-- Pilih Penulis --</option>
                                ${penulis.map(p => `<option value="${p.id}">${p.nama_depan} ${p.nama_belakang}</option>`).join('')}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                ${kategori.map(k => `<option value="${k.id}">${k.nama_kategori}</option>`).join('')}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="isi" rows="8" placeholder="Tuliskan isi artikel secara lengkap..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar Unggulan</label>
                        <input type="file" name="gambar" accept="image/*">
                        <small style="color: #64748b;">Format: JPG, PNG, atau WEBP</small>
                    </div>

                    <div class="form-group" style="padding: 12px; background: #f0f9ff; border-radius: 8px; border-left: 4px solid #018790;">
                        <label style="color: #005461; margin-bottom: 5px;">Tanggal Publikasi</label>
                        <p style="margin: 0; color: #475569; font-weight: 500;">${formatTanggal(new Date().toISOString().split('T')[0])}</p>
                        <small style="color: #64748b; display: block; margin-top: 4px;">Artikel akan diterbitkan pada hari ini</small>
                    </div>

                    <div class="form-buttons">
                        <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                        <button type="submit" class="btn btn-simpan">Simpan Artikel</button>
                    </div>
                </form>
            </div>`;
                bukaFormModal(html);
            } catch (e) {
                tampilNotif("Gagal memuat referensi data.", "error");
            }
        }

        async function simpanArtikel(event) {
            event.preventDefault();
            const res = await fetch('simpan_artikel.php', { method: 'POST', body: new FormData(document.getElementById('formArtikel')) });
            const hasil = await res.json();
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); tutupFormModal(); muatArtikel(); }
            else tampilNotif("Gagal simpan artikel: " + hasil.pesan, 'error');
        }

        async function editArtikel(id) {
            const [a, penulis, kategori] = await Promise.all([
                fetch('ambil_satu_artikel.php?id=' + id).then(r => r.json()),
                fetch('ambil_penulis.php').then(r => r.json()),
                fetch('ambil_kategori.php').then(r => r.json())
            ]);

            const html = `
                <div class="form-box" style="margin:0; max-width:100%;">
                    <h2 style="margin-top:0;">Edit Artikel</h2>
                    <form id="formEditArtikel" onsubmit="updateArtikel(event)">
                        <input type="hidden" name="id" value="${a.id}">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" value="${a.judul}" required>
                        </div>
                        <div class="form-row-2">
                            <div class="form-group">
                                <label>Penulis</label>
                                <select name="id_penulis" required>
                                    ${penulis.map(p => `<option value="${p.id}" ${p.id == a.id_penulis ? 'selected' : ''}>${p.nama_depan} ${p.nama_belakang}</option>`).join('')}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" required>
                                    ${kategori.map(k => `<option value="${k.id}" ${k.id == a.id_kategori ? 'selected' : ''}>${k.nama_kategori}</option>`).join('')}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Isi Artikel</label>
                            <textarea name="isi" required>${a.isi}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar (kosongkan jika tidak diganti)</label>
                            <input type="file" name="gambar" accept="image/*">
                        </div>
                        <div class="form-group" style="padding: 12px; background: #f0f9ff; border-radius: 8px; border-left: 4px solid #018790;">
                            <label style="color: #005461; margin-bottom: 5px;">Tanggal Publikasi</label>
                            <p style="margin: 0; color: #475569; font-weight: 500;">${formatTanggal(a.hari_tanggal)}</p>
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                            <button type="submit" class="btn btn-simpan">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>`;
            bukaFormModal(html);
        }

        async function updateArtikel(event) {
            event.preventDefault();
            const res = await fetch('update_artikel.php', { method: 'POST', body: new FormData(document.getElementById('formEditArtikel')) });
            const hasil = await res.json();
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); tutupFormModal(); muatArtikel(); }
            else tampilNotif("Gagal update: " + hasil.pesan, 'error');
        }

        async function hapusArtikel(id) {
            const hasil = await fetch('hapus_artikel.php?id=' + id).then(r => r.json());
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); muatArtikel(); }
            else tampilNotif("Gagal hapus: " + hasil.pesan, 'error');
        }

        /* ════════════════════════════════════
            KATEGORI
        ════════════════════════════════════ */
        async function muatKategori() {
            setActiveNav('nav-kategori');
            const main = document.getElementById('konten-utama');
            main.innerHTML = `<div class="loading-state"><i class="fas fa-spinner fa-spin"></i><p>Memuat data...</p></div>`;

            try {
                const data = await fetch('ambil_kategori.php').then(r => r.json());

                let rows = '';
                if (data.length === 0) {
                    rows = `<tr><td colspan="3"><div class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada kategori</p></div></td></tr>`;
                } else {
                    data.forEach(k => {
                        rows += `
                        <tr>
                            <td>${badgeKategori(k.nama_kategori)}</td>
                            <td style="color:#666;font-size:13px;">${k.keterangan || '-'}</td>
                            <td>
                                <button class="btn btn-edit" onclick="editKategori(${k.id})"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-hapus" onclick="bukaModalHapus(${k.id},'kategori')"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>`;
                    });
                }

                main.innerHTML = `
                    <div class="table-header">
                        <h2>Data Kategori Artikel</h2>
                        <button class="btn btn-tambah" onclick="formTambahKategori()">+ Tambah Kategori</button>
                    </div>
                    <table>
                        <thead><tr>
                            <th>NAMA KATEGORI</th><th>KETERANGAN</th><th>AKSI</th>
                        </tr></thead>
                        <tbody>${rows}</tbody>
                    </table>`;
            } catch (e) {
                main.innerHTML = `<div class="empty-state"><i class="fas fa-exclamation-circle" style="color:#e74c3c;"></i><p>Gagal memuat kategori.</p></div>`;
            }
        }

        function formTambahKategori() {
            const html = `
                <div class="form-box" style="margin:0; max-width:100%;">
                    <h2 style="margin-top:0;">Tambah Kategori</h2>
                    <form id="formKategori" onsubmit="simpanKategori(event)">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" placeholder="Nama kategori..." required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" placeholder="Deskripsi kategori..."></textarea>
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                            <button type="submit" class="btn btn-simpan">Simpan Data</button>
                        </div>
                    </form>
                </div>`;
            bukaFormModal(html);
        }

        async function simpanKategori(event) {
            event.preventDefault();
            try {
                const res = await fetch('simpan_kategori.php', { method: 'POST', body: new FormData(document.getElementById('formKategori')) });
                const hasil = await res.json();
                if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); tutupFormModal(); muatKategori(); }
                else tampilNotif("Gagal: " + hasil.pesan, 'error');
            } catch { tampilNotif("Terjadi kesalahan sistem!", 'error'); }
        }

        async function editKategori(id) {
            const k = await fetch('ambil_satu_kategori.php?id=' + id).then(r => r.json());

            const html = `
                <div class="form-box" style="margin:0; max-width:100%;">
                    <h2 style="margin-top:0;">Edit Kategori</h2>
                    <form id="formEditKategori" onsubmit="updateKategori(event)">
                        <input type="hidden" name="id" value="${k.id}">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" value="${k.nama_kategori}" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan">${k.keterangan || ''}</textarea>
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="btn btn-batal" onclick="tutupFormModal()">Batal</button>
                            <button type="submit" class="btn btn-simpan">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>`;
            bukaFormModal(html);
        }

        async function updateKategori(event) {
            event.preventDefault();
            const res = await fetch('update_kategori.php', { method: 'POST', body: new FormData(document.getElementById('formEditKategori')) });
            const hasil = await res.json();
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); tutupFormModal(); muatKategori(); }
            else tampilNotif("Gagal update: " + hasil.pesan, 'error');
        }

        async function hapusKategori(id) {
            const hasil = await fetch('hapus_kategori.php?id=' + id).then(r => r.json());
            if (hasil.status === 'sukses') { tampilNotif(hasil.pesan, 'sukses'); muatKategori(); }
            else tampilNotif("Gagal hapus: " + hasil.pesan, 'error');
        }

        // Auto-load halaman pertama kali dibuka
        window.onload = function () {
            muatPenulis();
        };
    </script>

</body>

</html>