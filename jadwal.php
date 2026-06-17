<?php
include "koneksi.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

if ($search) {
    $query = mysqli_query($koneksi, "
        SELECT j.*, f.judul, f.genre, s.nama_studio
        FROM jadwal j
        JOIN film f ON j.id_film = f.id_film
        JOIN studio s ON j.id_studio = s.id_studio
        WHERE f.judul LIKE '%$search%' OR s.nama_studio LIKE '%$search%'
        ORDER BY j.tanggal ASC, j.jam_tayang ASC
    ");
} else {
    $query = mysqli_query($koneksi, "
        SELECT j.*, f.judul, f.genre, s.nama_studio
        FROM jadwal j
        JOIN film f ON j.id_film = f.id_film
        JOIN studio s ON j.id_studio = s.id_studio
        ORDER BY j.tanggal ASC, j.jam_tayang ASC
    ");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal - Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <h1>Data Jadwal Tayang</h1>

        <div class="toolbar">
            <a href="add_jadwal.php">+ Tambah Jadwal</a>
            <form method="GET" action="jadwal.php" class="search-form">
                <input type="text" name="search" placeholder="Cari judul film atau studio..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn-search">Cari</button>
                <?php if ($search): ?>
                    <a href="jadwal.php" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($search): ?>
            <p class="search-info">Hasil pencarian: <strong>"<?= htmlspecialchars($search) ?>"</strong></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>No.</th>
                <th>Judul Film</th>
                <th>Genre</th>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Jam Tayang</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($query) == 0): ?>
            <tr><td colspan="7" style="text-align:center; color:#888;">Tidak ada data ditemukan.</td></tr>
            <?php else:
            while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><span class="badge"><?= htmlspecialchars($row['genre']) ?></span></td>
                <td><?= htmlspecialchars($row['nama_studio']) ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                <td><?= substr($row['jam_tayang'], 0, 5) ?></td>
                <td>
                    <a href="edit_jadwal.php?id_jadwal=<?= $row['id_jadwal'] ?>">Edit</a>
                    <a href="action_jadwal.php?id_jadwal=<?= $row['id_jadwal'] ?>" class="btn-delete" onclick="return confirm('Hapus jadwal ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; endif; ?>
        </table>
    </div>
</body>
</html>
