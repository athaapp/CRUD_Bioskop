<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$total_film   = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM film"))[0];
$total_studio = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM studio"))[0];
$total_jadwal = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM jadwal"))[0];
$total_tiket  = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(jumlah_tiket) FROM tiket"))[0] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <h1>Dashboard Bioskop</h1>

        <div class="card-grid">
            <div class="card card-blue"
     onclick="window.location='index.php'">
                <div class="card-icon">🎬</div>
                <div class="card-info">
                    <span class="card-number"><?= $total_film ?></span>
                    <span class="card-label">Total Film</span>
                </div>
                <a href="index.php" class="card-link">Lihat Data →</a>
            </div>
            <div class="card card-green"
     onclick="window.location='studio.php'">
                <div class="card-icon">🏛️</div>
                <div class="card-info">
                    <span class="card-number"><?= $total_studio ?></span>
                    <span class="card-label">Total Studio</span>
                </div>
                <a href="studio.php" class="card-link">Lihat Data →</a>
            </div>
            <div class="card card-orange"
     onclick="window.location='jadwal.php'">
                <div class="card-icon">📅</div>
                <div class="card-info">
                    <span class="card-number"><?= $total_jadwal ?></span>
                    <span class="card-label">Total Jadwal</span>
                </div>
                <a href="jadwal.php" class="card-link">Lihat Data →</a>
            </div>
            <div class="card card-red"
     onclick="window.location='tiket.php'">
                <div class="card-icon">🎟️</div>
                <div class="card-info">
                    <span class="card-number"><?= $total_tiket ?></span>
                    <span class="card-label">Tiket Terjual</span>
                </div>
                <a href="tiket.php" class="card-link">Lihat Data →</a>
            </div>
        </div>

        <h2 style="margin: 30px 0 15px;">Jadwal Tayang Mendatang</h2>
        <table>
            <tr>
                <th>No.</th>
                <th>Judul Film</th>
                <th>Genre</th>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Jam Tayang</th>
            </tr>
            <?php
            $q = mysqli_query($koneksi, "
                SELECT j.*, f.judul, f.genre, s.nama_studio
                FROM jadwal j
                JOIN film f ON j.id_film = f.id_film
                JOIN studio s ON j.id_studio = s.id_studio
                ORDER BY j.tanggal ASC, j.jam_tayang ASC
            ");
            $no = 1;
            while ($row = mysqli_fetch_assoc($q)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td><?= htmlspecialchars($row['nama_studio']) ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                <td><?= substr($row['jam_tayang'], 0, 5) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>