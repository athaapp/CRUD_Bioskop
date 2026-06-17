<?php
include "koneksi.php";

if (isset($_POST['add'])) {
    $nama_studio = mysqli_real_escape_string($koneksi, $_POST['nama_studio']);
    $kapasitas   = (int) $_POST['kapasitas'];

    if (empty($nama_studio) || $kapasitas <= 0) {
        echo "<script>alert('Data tidak valid!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "INSERT INTO studio (nama_studio, kapasitas) VALUES ('$nama_studio', $kapasitas)");
    header("Location: studio.php");
    exit;
}

if (isset($_POST['update'])) {
    $id          = (int) $_GET['id_studio'];
    $nama_studio = mysqli_real_escape_string($koneksi, $_POST['nama_studio']);
    $kapasitas   = (int) $_POST['kapasitas'];

    if (empty($nama_studio) || $kapasitas <= 0) {
        echo "<script>alert('Data tidak valid!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "UPDATE studio SET nama_studio='$nama_studio', kapasitas=$kapasitas WHERE id_studio=$id");
    header("Location: studio.php");
    exit;
}

if (isset($_GET['id_studio']) && !isset($_POST['update'])) {
    $id = (int) $_GET['id_studio'];
    mysqli_query($koneksi, "DELETE FROM studio WHERE id_studio=$id");
    header("Location: studio.php");
    exit;
}
