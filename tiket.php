<?php
include "koneksi.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

if ($search) {
    $query = mysqli_query($koneksi, "
        SELECT t.*, f.judul, s.nama_studio, j.tanggal, j.jam_tayang
        FROM tiket t
        JOIN jadwal j ON t.id_jadwal = j.id_jadwal
        JOIN film f ON j.id_film = f.id_film
        JOIN studio s ON j.id_studio = s.id_studio
        WHERE t.nama_pembeli LIKE '%$search%' OR f.judul LIKE '%$search%'
        ORDER BY j.tanggal ASC
    ");
} else {
    $query = mysqli_query($koneksi, "
        SELECT t.*, f.judul, s.nama_studio, j.tanggal, j.jam_tayang
        FROM tiket t
        JOIN jadwal j ON t.id_jadwal = j.id_jadwal
        JOIN film f ON j.id_film = f.id_film
        JOIN studio s ON j.id_studio = s.id_studio
        ORDER BY j.tanggal ASC
    ");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tiket - Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <h1>Data Pembelian Tiket</h1>

        <div class="toolbar">
            <a href="add_tiket.php">+ Beli Tiket</a>
            <form method="GET" action="tiket.php" class="search-form">
                <input type="text" name="search" placeholder="Cari nama pembeli atau judul film..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn-search">Cari</button>
                <?php if ($search): ?>
                    <a href="tiket.php" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($search): ?>
            <p class="search-info">Hasil pencarian: <strong>"<?= htmlspecialchars($search) ?>"</strong></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>No.</th>
                <th>Nama Pembeli</th>
                <th>Judul Film</th>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Jumlah Tiket</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($query) == 0): ?>
            <tr><td colspan="8" style="text-align:center; color:#888;">Tidak ada data ditemukan.</td></tr>
            <?php else:
            while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_pembeli']) ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['nama_studio']) ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                <td><?= substr($row['jam_tayang'], 0, 5) ?></td>
                <td><?= $row['jumlah_tiket'] ?> tiket</td>
                <td>
                    <a href="edit_tiket.php?id_tiket=<?= $row['id_tiket'] ?>">Edit</a>
                    <a href="action_tiket.php?id_tiket=<?= $row['id_tiket'] ?>" class="btn-delete" onclick="return confirm('Hapus data tiket ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; endif; ?>
        </table>
    </div>
</body>
</html>
