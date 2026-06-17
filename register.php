<?php
session_start();
// Jika user sudah login, tidak perlu registrasi lagi, langsung lempar ke dashboard
if (isset($_SESSION['status']) && $_SESSION['status'] === 'login') {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - CRUD Bioskop</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body { font-family: Arial, sans-serif; background-color: #1e1e1e; color: #fff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .register-container { background-color: #252526; padding: 30px; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); width: 400px; }
        .register-container h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #3c3c3c; background-color: #3c3c3c; color: #fff; border-radius: 8px; }
        .btn-register { width: 100%; padding: 10px; background-color: #28a745; border: none; color: white; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .btn-register:hover { background-color: #218838; }
        .message { text-align: center; margin-bottom: 15px; font-size: 14px; }
        .error { color: #f48771; }
        .success { color: #73c991; }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .login-link a { color: #007acc; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Daftar Akun Baru</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <form action="action_register.php" method="POST" autocomplete="off">
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required autocomplete="off">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required autocomplete="new-password">
    </div>
    
    <div class="form-group">
        <label for="confirm_password">Konfirmasi Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required autocomplete="new-password">
    </div>
    
    <button type="submit" name="register" class="btn-register">Daftar Sekarang</button>
</form>

    <div class="login-link">
        Sudah punya akun? <a href="login.php">Log In</a>
    </div>
</div>

</body>
</html>