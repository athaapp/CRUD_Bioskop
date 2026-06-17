<?php
include "koneksi.php";

if (isset($_POST['add'])) {
    $id_film    = (int) $_POST['id_film'];
    $id_studio  = (int) $_POST['id_studio'];
    $tanggal    = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam_tayang = mysqli_real_escape_string($koneksi, $_POST['jam_tayang']);

    if (!$id_film || !$id_studio || empty($tanggal) || empty($jam_tayang)) {
        echo "<script>alert('Semua field harus diisi!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "INSERT INTO jadwal (id_film, id_studio, tanggal, jam_tayang)
        VALUES ($id_film, $id_studio, '$tanggal', '$jam_tayang')");
    header("Location: jadwal.php");
    exit;
}

if (isset($_POST['update'])) {
    $id         = (int) $_GET['id_jadwal'];
    $id_film    = (int) $_POST['id_film'];
    $id_studio  = (int) $_POST['id_studio'];
    $tanggal    = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam_tayang = mysqli_real_escape_string($koneksi, $_POST['jam_tayang']);

    if (!$id_film || !$id_studio || empty($tanggal) || empty($jam_tayang)) {
        echo "<script>alert('Semua field harus diisi!'); history.back();</script>";
        exit;
    }

    mysqli_query($koneksi, "UPDATE jadwal SET id_film=$id_film, id_studio=$id_studio,
        tanggal='$tanggal', jam_tayang='$jam_tayang' WHERE id_jadwal=$id");
    header("Location: jadwal.php");
    exit;
}

if (isset($_GET['id_jadwal']) && !isset($_POST['update'])) {
    $id = (int) $_GET['id_jadwal'];
    mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal=$id");
    header("Location: jadwal.php");
    exit;
}
