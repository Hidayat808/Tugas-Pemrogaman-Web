



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran SD Harapan Bangsa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.95;
        }

        .form-container {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95em;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-option input[type="radio"] {
            width: auto;
            margin: 0;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .info-box {
            background: #f0f4ff;
            border-left: 4px solid #667eea;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .info-box h3 {
            color: #667eea;
            margin-bottom: 8px;
        }

        .info-box p {
            color: #555;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-container {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 20px;
            }

            .radio-group {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .header h1 {
                font-size: 1.5em;
            }

            .header p {
                font-size: 0.95em;
            }

            .form-container {
                padding: 20px 15px;
            }
        }

        .success-message {
            display: none;
            background: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 SD Harapan Bangsa</h1>
            <p>Formulir Pendaftaran Siswa Baru Tahun Ajaran 2025/2026</p>
        </div>

        <div class="form-container">
            <div class="info-box">
                <h3>📋 Informasi Pendaftaran</h3>
                <p>Silakan lengkapi formulir di bawah ini dengan data yang benar. Setelah mengirim formulir, kami akan menghubungi Anda untuk proses selanjutnya.</p>
            </div>

            <form id="registrationForm">
                <div class="form-group">
                    <label>Nama Lengkap Siswa *</label>
                    <input type="text" name="nama" required placeholder="Contoh: Ahmad Rizki Pratama">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Tempat Lahir *</label>
                        <input type="text" name="tempat_lahir" required placeholder="Contoh: Jakarta">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin *</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
                            <label for="laki" style="margin: 0;">Laki-laki</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                            <label for="perempuan" style="margin: 0;">Perempuan</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap *</label>
                    <textarea name="alamat" required placeholder="Masukkan alamat lengkap tempat tinggal"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Orang Tua/Wali *</label>
                        <input type="text" name="nama_ortu" required placeholder="Nama Ayah/Ibu/Wali">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon *</label>
                        <input type="tel" name="telepon" required placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email Orang Tua</label>
                    <input type="email" name="email" placeholder="email@contoh.com">
                </div>

                <div class="form-group">
                    <label>Asal Sekolah TK/PAUD</label>
                    <input type="text" name="asal_sekolah" placeholder="Nama TK/PAUD sebelumnya">
                </div>

                <div class="form-group">
                    <label>Catatan Tambahan</label>
                    <textarea name="catatan" placeholder="Informasi tambahan yang perlu kami ketahui"></textarea>
                </div>

                <button type="submit" class="btn-submit">📝 Kirim Pendaftaran</button>

                <div class="success-message" id="successMessage">
                    ✅ Pendaftaran berhasil dikirim! Kami akan menghubungi Anda segera.
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const successMsg = document.getElementById('successMessage');
            successMsg.style.display = 'block';
            
            setTimeout(() => {
                this.reset();
                successMsg.style.display = 'none';
            }, 3000);
        });
    </script>
</body>
</html>