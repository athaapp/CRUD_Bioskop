<?php
session_start();
include 'koneksi.php'; 

if (isset($_POST['login'])) {
    
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; 

    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['status'] = 'login';
            
            header("Location: dashboard.php");
            exit;
            
        } else {
            $_SESSION['error'] = "Username atau Password salah! (Password tidak cocok)";
            header("Location: login.php");
            exit;
        }

    } else {
        $_SESSION['error'] = "Username atau Password salah! (Username tidak ditemukan)";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>