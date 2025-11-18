<?php
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SD Harapan Bangsa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            display: flex;
            min-height: 100vh;
             background: url('sdn3.png') no-repeat center center/cover; /* ganti sesuai nama file */
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.3em;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.85em;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            cursor: pointer;
        }

        .menu-item:hover,
        .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
        }

        .menu-item .icon {
            font-size: 1.3em;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            transition: margin-left 0.3s ease;
        }

        .top-navbar {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #333;
            border-radius: 3px;
            transition: 0.3s;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .content-area {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #666;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8em;
        }

        .stat-icon.blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .stat-icon.green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .stat-icon.orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .stat-icon.purple { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }

        .stat-info h3 {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .stat-info .number {
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .card-header h2 {
            color: #333;
            font-size: 1.3em;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-warning {
            background: #ffc107;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
        }

        table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #dee2e6;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            color: #666;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .modal-close {
            font-size: 1.5em;
            cursor: pointer;
            color: #999;
        }

        .modal-close:hover {
            color: #333;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .hamburger {
                display: flex;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 0.9em;
            }

            .content-area {
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        .chart-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>🎓 SDN 3 Tegal Sari </h2>
            <p>Admin Panel</p>
        </div>
        <nav class="sidebar-menu">
            <a class="menu-item active" onclick="showPage('dashboard')">
                <span class="icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a class="menu-item" onclick="showPage('registrations')">
                <span class="icon">📝</span>
                <span>Pendaftaran</span>
            </a>
            <a class="menu-item" onclick="showPage('students')">
                <span class="icon">👨‍🎓</span>
                <span>Data Siswa</span>
            </a>
            <a class="menu-item" onclick="showPage('teachers')">
                <span class="icon">👨‍🏫</span>
                <span>Data Guru</span>
            </a>
            <a class="menu-item" onclick="showPage('announcements')">
                <span class="icon">📢</span>
                <span>Pengumuman</span>
            </a>
            <a class="menu-item" onclick="showPage('settings')">
                <span class="icon">⚙️</span>
                <span>Pengaturan</span>
            </a>
            <a class="menu-item" href="#" onclick="viewPublicSite(event)">
                <span class="icon">🌐</span>
                <span>Lihat Website</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div></div>
            <div class="admin-info">
                <div class="admin-avatar">AD</div>
                <div>
                    <strong>dayat</strong>
                    <p style="font-size: 0.85em; color: #666;">Administrator</p>
                </div>
                <a href="#" class="logout-btn" onclick="logout(event)">Logout</a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Page -->
            <div id="dashboardPage">
                <div class="page-header">
                    <h1>Dashboard Overview</h1>
                    <p>Selamat datang di Admin Panel SD 3 TegalSari</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">📝</div>
                        <div class="stat-info">
                            <h3>Pendaftar Baru</h3>
                            <div class="number">45</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">👨‍🎓</div>
                        <div class="stat-info">
                            <h3>Total Siswa</h3>
                            <div class="number">485</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">👨‍🏫</div>
                        <div class="stat-info">
                            <h3>Total Guru</h3>
                            <div class="number">42</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">📚</div>
                        <div class="stat-info">
                            <h3>Kelas Aktif</h3>
                            <div class="number">18</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>📝 Pendaftar Terbaru</h2>
                        <button class="btn btn-primary" onclick="showPage('registrations')">Lihat Semua</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ahmad Rizki Pratama</td>
                                <td>18 Nov 2025</td>
                                <td><span class="badge badge-warning">Menunggu</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-success btn-sm">Terima</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Siti Nurhaliza</td>
                                <td>17 Nov 2025</td>
                                <td><span class="badge badge-success">Diterima</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>16 Nov 2025</td>
                                <td><span class="badge badge-warning">Menunggu</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-success btn-sm">Terima</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Registrations Page -->
            <div id="registrationsPage" style="display: none;">
                <div class="page-header">
                    <h1>Kelola Pendaftaran</h1>
                    <p>Daftar semua pendaftar siswa baru</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>📝 Semua Pendaftar (45)</h2>
                        <button class="btn btn-primary" onclick="openModal('addRegistration')">+ Tambah Manual</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tempat, Tgl Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Orang Tua</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="registrationTableBody">
                            <tr>
                                <td>1</td>
                                <td>Ahmad Rizki Pratama</td>
                                <td>Jakarta, 15 Mei 2018</td>
                                <td>Laki-laki</td>
                                <td>Budi Prasetyo</td>
                                <td>081234567890</td>
                                <td><span class="badge badge-warning">Menunggu</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-success btn-sm" onclick="updateStatus(1, 'accepted')">Terima</button>
                                        <button class="btn btn-danger btn-sm" onclick="updateStatus(1, 'rejected')">Tolak</button>
                                        <button class="btn btn-primary btn-sm" onclick="viewDetail(1)">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti Nurhaliza</td>
                                <td>Bandung, 20 Juni 2018</td>
                                <td>Perempuan</td>
                                <td>Hasan Wijaya</td>
                                <td>081234567891</td>
                                <td><span class="badge badge-success">Diterima</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm" onclick="viewDetail(2)">Detail</button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteRegistration(2)">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Budi Santoso</td>
                                <td>Surabaya, 10 April 2018</td>
                                <td>Laki-laki</td>
                                <td>Siti Rahayu</td>
                                <td>081234567892</td>
                                <td><span class="badge badge-warning">Menunggu</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-success btn-sm" onclick="updateStatus(3, 'accepted')">Terima</button>
                                        <button class="btn btn-danger btn-sm" onclick="updateStatus(3, 'rejected')">Tolak</button>
                                        <button class="btn btn-primary btn-sm" onclick="viewDetail(3)">Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Students Page -->
            <div id="studentsPage" style="display: none;">
                <div class="page-header">
                    <h1>Data Siswa</h1>
                    <p>Kelola data siswa aktif</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>👨‍🎓 Daftar Siswa (485)</h2>
                        <button class="btn btn-primary" onclick="openModal('addStudent')">+ Tambah Siswa</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025001</td>
                                <td>Ahmad Rizki Pratama</td>
                                <td>1A</td>
                                <td>Laki-laki</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-warning btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2025002</td>
                                <td>Siti Nurhaliza</td>
                                <td>1B</td>
                                <td>Perempuan</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-warning btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Teachers Page -->
            <div id="teachersPage" style="display: none;">
                <div class="page-header">
                    <h1>Data Guru</h1>
                    <p>Kelola data guru dan staff</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>👨‍🏫 Daftar Guru & Staff (42)</h2>
                        <button class="btn btn-primary" onclick="openModal('addTeacher')">+ Tambah Guru</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>198501012010011001</td>
                                <td>Dr. Andi Wijaya, S.Pd</td>
                                <td>Matematika</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-warning btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>198701152012012001</td>
                                <td>Siti Rahmawati, S.Pd</td>
                                <td>Bahasa Indonesia</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-warning btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Announcements Page -->
            <div id="announcementsPage" style="display: none;">
                <div class="page-header">
                    <h1>Kelola Pengumuman</h1>
                    <p>Buat dan kelola pengumuman sekolah</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>📢 Daftar Pengumuman</h2>
                        <button class="btn btn-primary" onclick="openModal('addAnnouncement')">+ Buat Pengumuman</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Penerimaan Siswa Baru 2025/2026 Dibuka!</td>
                                <td>18 Nov 2025</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Libur Semester Ganjil</td>
                                <td>15 Nov 2025</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Settings Page -->
            <div id="settingsPage" style="display: none;">
                <div class="page-header">
                    <h1>Pengaturan</h1>
                    <p>Kelola pengaturan sistem</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>⚙️ Pengaturan Sekolah</h2>
                    </div>
                    <form>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input type="text" value="SD Harapan Bangsa">
                            </div>
                            <div class="form-group">
                                <label>Email Sekolah</label>
                                <input type="email" value="info@sdharapanbangsa.sch.id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="tel" value="(021) 12345678">
                            </div>
                            <div class="form-group">
                                <label>Tahun Ajaran Aktif</label>
                                <input type="text" value="2025/2026">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea rows="3">Jl. Pendidikan No. 123, Jakarta Selatan, DKI Jakarta</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding/Editing -->
    <div id="modal" class="modal">
        <div class="modal