<?php
// login.php
session_start();
include 'koneksi.php'; // pastikan path benar

$error = "";

if (isset($_POST['login'])) {
    // ambil input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // validasi sederhana
    if ($username == "" || $password == "") {
        $error = "Isi username dan password.";
    } else {
        // gunakan prepared statement untuk keamanan
        $stmt = $koneksi->prepare("SELECT * FROM katalog_buku WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            // login sukses
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login Klinik Online</title>
    <link rel="stylesheet" href="style.css"> <!-- opsional -->
    <style>
        /* styling sederhana jika belum ada style.css */
        body { font-family: Arial, sans-serif; background:#f4f6f8; padding:40px; }
        .login-box { width:360px; margin:60px auto; background:#fff; padding:20px; box-shadow:0 2px 8px rgba(0,0,0,0.1); border-radius:6px; }
        .login-box h2 { margin:0 0 15px; text-align:center; }
        .login-box input { width:100%; padding:8px; margin:8px 0; box-sizing:border-box; }
        .login-box button { width:100%; padding:10px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer; }
        .login-box button:hover { background:#0056b3; }
        .error { color:#b00020; text-align:center; margin-bottom:8px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔒 Login Klinik Online</h2>

        <?php if ($error != ""): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>