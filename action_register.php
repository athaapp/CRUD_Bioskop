<?php
session_start();
include 'koneksi.php'; 

if (isset($_POST['register'])) {
    
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Konfirmasi password tidak cocok!";
        header("Location: register.php");
        exit;
    }

    $check_user_query = "SELECT username FROM pengguna WHERE username = '$username'";
    $check_result = mysqli_query($koneksi, $check_user_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "Username sudah terpakai, gunakan nama lain!";
        header("Location: register.php");
        exit;
    }

    $query = "INSERT INTO pengguna (username, password) VALUES ('$username', '$password')";
    
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "Gagal mendaftarkan akun, coba lagi nanti.";
        header("Location: register.php");
        exit;
    }

} else {
    header("Location: register.php");
    exit;
}
?>