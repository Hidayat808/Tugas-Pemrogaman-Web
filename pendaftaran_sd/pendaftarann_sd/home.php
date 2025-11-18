





<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SD Harapan Bangsa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .logo {
            color: white;
            font-size: 1.5em;
            font-weight: bold;
            padding: 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 5px;
        }

        .nav-menu li a {
            color: white;
            text-decoration: none;
            padding: 25px 20px;
            display: block;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-menu li a:hover,
        .nav-menu li a.active {
            background: rgba(255, 255, 255, 0.2);
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
            background: white;
            border-radius: 3px;
            transition: 0.3s;
        }

        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-banner h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .welcome-banner p {
            font-size: 1.2em;
            opacity: 0.95;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card .icon {
            font-size: 3em;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            color: #666;
            font-size: 0.95em;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-card .number {
            font-size: 2.5em;
            font-weight: bold;
            color: #667eea;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
        }

        .announcement-item {
            padding: 15px;
            border-left: 4px solid #667eea;
            background: #f8f9fa;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .announcement-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .announcement-item h4 {
            color: #333;
            margin-bottom: 5px;
        }

        .announcement-item p {
            color: #666;
            font-size: 0.9em;
        }

        .announcement-item .date {
            color: #999;
            font-size: 0.85em;
            margin-top: 5px;
        }

        .quick-links {
            display: grid;
            gap: 15px;
        }

        .quick-link-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.3);
        }

        .quick-link-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .quick-link-btn .icon {
            font-size: 2em;
        }

        .content-full {
            grid-column: 1 / -1;
        }

        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                gap: 0;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu li a {
                padding: 20px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .hamburger {
                display: flex;
            }

            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(8px, 8px);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(8px, -8px);
            }

            .welcome-banner h1 {
                font-size: 1.8em;
            }

            .welcome-banner p {
                font-size: 1em;
            }

            .main-content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 15px;
            }

            .logo {
                font-size: 1.2em;
            }

            .welcome-banner {
                padding: 25px;
            }

            .welcome-banner h1 {
                font-size: 1.5em;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                🎓 SD Harapan Bangsa
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="#" onclick="showRegistration(event)">Pendaftaran</a></li>
                <li><a href="#">Profil Sekolah</a></li>
                <li><a href="#">Akademik</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div id="dashboardContent">
            <div class="welcome-banner">
                <h1>Selamat Datang di SD Harapan Bangsa! 👋</h1>
                <p>Portal Informasi dan Pendaftaran Siswa Baru Tahun Ajaran 2025/2026</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="icon">👨‍🎓</div>
                    <h3>Total Siswa</h3>
                    <div class="number">485</div>
                </div>
                <div class="stat-card">
                    <div class="icon">👨‍🏫</div>
                    <h3>Guru & Staff</h3>
                    <div class="number">42</div>
                </div>
                <div class="stat-card">
                    <div class="icon">📚</div>
                    <h3>Kelas Aktif</h3>
                    <div class="number">18</div>
                </div>
                <div class="stat-card">
                    <div class="icon">🏆</div>
                    <h3>Prestasi</h3>
                    <div class="number">127</div>
                </div>
            </div>

            <div class="content-grid">
                <div class="card">
                    <h2>📢 Pengumuman Terbaru</h2>
                    <div class="announcement-item">
                        <h4>Penerimaan Siswa Baru 2025/2026 Dibuka!</h4>
                        <p>Pendaftaran siswa baru telah dibuka. Segera daftarkan putra-putri Anda melalui menu Pendaftaran.</p>
                        <div class="date">📅 18 November 2025</div>
                    </div>
                    <div class="announcement-item">
                        <h4>Libur Semester Ganjil</h4>
                        <p>Libur semester ganjil akan dimulai tanggal 20 Desember 2025 sampai 5 Januari 2026.</p>
                        <div class="date">📅 15 November 2025</div>
                    </div>
                    <div class="announcement-item">
                        <h4>Lomba Kreativitas Siswa</h4>
                        <p>SD Harapan Bangsa meraih juara 1 lomba mewarnai tingkat kota. Selamat untuk para siswa!</p>
                        <div class="date">📅 10 November 2025</div>
                    </div>
                    <div class="announcement-item">
                        <h4>Workshop Orang Tua</h4>
                        <p>Workshop parenting akan diadakan Sabtu, 25 November 2025 pukul 09.00 WIB di aula sekolah.</p>
                        <div class="date">📅 8 November 2025</div>
                    </div>
                </div>

                <div class="card">
                    <h2>⚡ Menu Cepat</h2>
                    <div class="quick-links">
                        <a href="#" class="quick-link-btn" onclick="showRegistration(event)">
                            <span class="icon">📝</span>
                            <span>Pendaftaran Siswa Baru</span>
                        </a>
                        <a href="#" class="quick-link-btn">
                            <span class="icon">📖</span>
                            <span>Kurikulum</span>
                        </a>
                        <a href="#" class="quick-link-btn">
                            <span class="icon">📅</span>
                            <span>Kalender Akademik</span>
                        </a>
                        <a href="#" class="quick-link-btn">
                            <span class="icon">📸</span>
                            <span>Galeri Kegiatan</span>
                        </a>
                        <a href="#" class="quick-link-btn">
                            <span class="icon">📞</span>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="content-grid" style="margin-top: 25px;">
                <div class="card">
                    <h2>🎯 Visi & Misi</h2>
                    <h4 style="color: #667eea; margin-bottom: 10px;">Visi:</h4>
                    <p style="margin-bottom: 20px; line-height: 1.8;">Menjadi sekolah dasar unggulan yang menghasilkan generasi cerdas, berakhlak mulia, dan berwawasan global.</p>
                    
                    <h4 style="color: #667eea; margin-bottom: 10px;">Misi:</h4>
                    <ul style="line-height: 2; color: #555; margin-left: 20px;">
                        <li>Menyelenggarakan pendidikan berkualitas dengan pendekatan modern</li>
                        <li>Membentuk karakter siswa yang berakhlak mulia</li>
                        <li>Mengembangkan kreativitas dan potensi siswa</li>
                        <li>Membangun kerjasama dengan orang tua dan masyarakat</li>
                    </ul>
                </div>

                <div class="card">
                    <h2>🏫 Fasilitas Sekolah</h2>
                    <ul style="line-height: 2.2; color: #555;">
                        <li>✅ Ruang Kelas Ber-AC</li>
                        <li>✅ Laboratorium Komputer</li>
                        <li>✅ Perpustakaan Digital</li>
                        <li>✅ Lapangan Olahraga</li>
                        <li>✅ Kantin Sehat</li>
                        <li>✅ Musholla</li>
                        <li>✅ Ruang UKS</li>
                        <li>✅ Area Bermain</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="registrationContent" style="display: none;">
            <!-- Registration Form Content -->
        </div>
    </div>

    <script>
        // Hamburger Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });

        // Show Registration Form
        function showRegistration(e) {
            e.preventDefault();
            
            const dashboardContent = document.getElementById('dashboardContent');
            const registrationContent = document.getElementById('registrationContent');
            
            dashboardContent.style.display = 'none';
            registrationContent.innerHTML = `
                <div class="card content-full">
                    <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; text-align: center;">
                        <h1 style="font-size: 2em; margin-bottom: 10px;">🎓 Formulir Pendaftaran Siswa Baru</h1>
                        <p style="font-size: 1.1em;">Tahun Ajaran 2025/2026</p>
                    </div>

                    <div style="background: #f0f4ff; border-left: 4px solid #667eea; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                        <h3 style="color: #667eea; margin-bottom: 10px;">📋 Informasi Pendaftaran</h3>
                        <p style="color: #555; line-height: 1.6;">Silakan lengkapi formulir di bawah ini dengan data yang benar. Setelah mengirim formulir, kami akan menghubungi Anda untuk proses selanjutnya.</p>
                    </div>

                    <form id="registrationForm">
                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Nama Lengkap Siswa *</label>
                            <input type="text" required placeholder="Contoh: Ahmad Rizki Pratama" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Tempat Lahir *</label>
                                <input type="text" required placeholder="Contoh: Jakarta" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Tanggal Lahir *</label>
                                <input type="date" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Jenis Kelamin *</label>
                            <div style="display: flex; gap: 20px;">
                                <label style="display: flex; align-items: center; gap: 8px;">
                                    <input type="radio" name="gender" value="Laki-laki" required>
                                    <span>Laki-laki</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px;">
                                    <input type="radio" name="gender" value="Perempuan" required>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Alamat Lengkap *</label>
                            <textarea required placeholder="Masukkan alamat lengkap tempat tinggal" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em; min-height: 100px; font-family: inherit;"></textarea>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Nama Orang Tua/Wali *</label>
                                <input type="text" required placeholder="Nama Ayah/Ibu/Wali" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Nomor Telepon *</label>
                                <input type="tel" required placeholder="08xxxxxxxxxx" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                            </div>
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Email Orang Tua</label>
                            <input type="email" placeholder="email@contoh.com" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Asal Sekolah TK/PAUD</label>
                            <input type="text" placeholder="Nama TK/PAUD sebelumnya" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em;">
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600;">Catatan Tambahan</label>
                            <textarea placeholder="Informasi tambahan yang perlu kami ketahui" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1em; min-height: 100px; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-size: 1.1em; font-weight: 600; cursor: pointer; margin-top: 10px;">
                            📝 Kirim Pendaftaran
                        </button>

                        <button type="button" onclick="backToDashboard()" style="width: 100%; padding: 15px; background: #6c757d; color: white; border: none; border-radius: 10px; font-size: 1em; font-weight: 600; cursor: pointer; margin-top: 15px;">
                            ← Kembali ke Dashboard
                        </button>

                        <div id="successMessage" style="display: none; background: #4caf50; color: white; padding: 15px; border-radius: 10px; text-align: center; margin-top: 20px;">
                            ✅ Pendaftaran berhasil dikirim! Kami akan menghubungi Anda segera.
                        </div>
                    </form>
                </div>
            `;
            
            registrationContent.style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Handle form submission
            document.getElementById('registrationForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const successMsg = document.getElementById('successMessage');
                successMsg.style.display = 'block';
                
                setTimeout(() => {
                    this.reset();
                    successMsg.style.display = 'none';
                }, 3000);
            });

            // Update active menu
            document.querySelectorAll('.nav-menu a').forEach(a => a.classList.remove('active'));
            e.target.classList.add('active');
        }

        function backToDashboard() {
            document.getElementById('dashboardContent').style.display = 'block';
            document.getElementById('registrationContent').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Update active menu
            document.querySelectorAll('.nav-menu a').forEach(a => a.classList.remove('active'));
            document.querySelector('.nav-menu a').classList.add('active');
        }
    </script>
</body>
</html>