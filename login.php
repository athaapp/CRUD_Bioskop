<?php

session_start();

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
    <title>Login - CRUD Bioskop</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body { font-family: Arial, sans-serif; background-color: #1e1e1e; color: #fff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background-color: #252526; padding: 25px; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); width: 400px; }
        .login-container h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 10px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #3c3c3c; background-color: #3c3c3c; color: #fff; border-radius: 8px; }
        .btn-login { width: 100%; padding: 10px; background-color: #007acc; border: none; color: white; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .btn-login:hover { background-color: #0062a3; }
        .error-message { color: #f48771; text-align: center; margin-bottom: 15px; font-size: 14px; }
        .register-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .register-link a { color: #007acc; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Bioskop</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <form action="action_login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required autocomplete="new-password">
        </div>
        <button type="submit" name="login" class="btn-login">Masuk</button>
    </form>
    <div class="register-link">
        Belum punya akun? <a href="register.php">Daftar di sini</a>
    </div>
</div>

</body>
</html>