<?php
include "koneksi.php";

if (isset($_POST['add'])) {
    $nama_pembeli = mysqli_real_escape_string($koneksi, $_POST['nama_pembeli']);
    $id_jadwal    = (int) $_POST['id_jadwal'];
    $jumlah_tiket = (int) $_POST['jumlah_tiket'];

    if (empty($nama_pembeli) || !$id_jadwal || $jumlah_tiket <= 0) {
        echo "<script>alert('Semua field harus diisi dengan benar!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "INSERT INTO tiket (id_jadwal, nama_pembeli, jumlah_tiket)
        VALUES ($id_jadwal, '$nama_pembeli', $jumlah_tiket)");
    header("Location: tiket.php");
    exit;
}

if (isset($_POST['update'])) {
    $id           = (int) $_GET['id_tiket'];
    $nama_pembeli = mysqli_real_escape_string($koneksi, $_POST['nama_pembeli']);
    $id_jadwal    = (int) $_POST['id_jadwal'];
    $jumlah_tiket = (int) $_POST['jumlah_tiket'];

    if (empty($nama_pembeli) || !$id_jadwal || $jumlah_tiket <= 0) {
        echo "<script>alert('Semua field harus diisi dengan benar!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "UPDATE tiket SET id_jadwal=$id_jadwal,
        nama_pembeli='$nama_pembeli', jumlah_tiket=$jumlah_tiket WHERE id_tiket=$id");
    header("Location: tiket.php");
    exit;
}

if (isset($_GET['id_tiket']) && !isset($_POST['update'])) {
    $id = (int) $_GET['id_tiket'];
    mysqli_query($koneksi, "DELETE FROM tiket WHERE id_tiket=$id");
    header("Location: tiket.php");
    exit;
}
