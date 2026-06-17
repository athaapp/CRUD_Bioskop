<?php
include "koneksi.php";

if (isset($_POST['add'])) {
    $judul  = mysqli_real_escape_string($koneksi, trim($_POST['judul']));
    $genre  = mysqli_real_escape_string($koneksi, $_POST['genre']);
    $durasi = (int) $_POST['durasi'];

    if (empty($judul) || empty($genre) || $durasi <= 0) {
        echo "<script>alert('Semua field harus diisi dengan benar!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "INSERT INTO film (judul, genre, durasi) VALUES ('$judul', '$genre', $durasi)");
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $id     = (int) $_GET['id_film'];
    $judul  = mysqli_real_escape_string($koneksi, trim($_POST['judul']));
    $genre  = mysqli_real_escape_string($koneksi, $_POST['genre']);
    $durasi = (int) $_POST['durasi'];

    if (empty($judul) || empty($genre) || $durasi <= 0) {
        echo "<script>alert('Semua field harus diisi dengan benar!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "UPDATE film SET judul='$judul', genre='$genre', durasi=$durasi WHERE id_film=$id");
    header("Location: index.php");
    exit;
}

if (isset($_GET['id_film']) && !isset($_POST['update'])) {
    $id = (int) $_GET['id_film'];
    mysqli_query($koneksi, "DELETE FROM film WHERE id_film=$id");
    header("Location: index.php");
    exit;
}
