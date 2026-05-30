<?php

include "koneksi.php";

if (isset ($_POST ['add'])) {
    $judul = $_POST ['judul'];
    $genre = $_POST ['genre'];
    $durasi = $_POST ['durasi'];
    
    mysqli_query($koneksi, "INSERT INTO film (judul, genre, durasi)
    VALUES ('$judul', '$genre', '$durasi')");

    header("Location: index.php");
    exit;
}

if (isset ($_POST ['update'])) {
    $id = $_GET ['id_film'];
    $judul = $_POST ['judul'];
    $genre = $_POST ['genre'];
    $durasi = $_POST ['durasi'];
    
    mysqli_query($koneksi, "UPDATE film SET judul='$judul', genre='$genre', durasi='$durasi' WHERE id_film=$id");

    header("Location: index.php");
    exit;
}

if (isset ($_GET ['id_film'])) {
    $id = $_GET ['id_film'];
    
    mysqli_query($koneksi, "DELETE from film WHERE id_film=$id");

    header("Location: index.php");
    exit;
}