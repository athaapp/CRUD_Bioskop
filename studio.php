<?php
include "koneksi.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

if ($search) {
    $query = mysqli_query($koneksi, "SELECT * FROM studio WHERE nama_studio LIKE '%$search%'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM studio");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Studio - Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <h1>Data Studio Bioskop</h1>

        <div class="toolbar">
            <a href="add_studio.php">+ Tambah Studio</a>
            <form method="GET" action="studio.php" class="search-form">
                <input type="text" name="search" placeholder="Cari nama studio..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn-search">Cari</button>
                <?php if ($search): ?>
                    <a href="studio.php" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($search): ?>
            <p class="search-info">Hasil pencarian: <strong>"<?= htmlspecialchars($search) ?>"</strong></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>No.</th>
                <th>Nama Studio</th>
                <th>Kapasitas (kursi)</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($query) == 0): ?>
            <tr><td colspan="4" style="text-align:center; color:#888;">Tidak ada data ditemukan.</td></tr>
            <?php else:
            while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_studio']) ?></td>
                <td><?= $row['kapasitas'] ?> kursi</td>
                <td>
                    <a href="edit_studio.php?id_studio=<?= $row['id_studio'] ?>">Edit</a>
                    <a href="action_studio.php?id_studio=<?= $row['id_studio'] ?>" class="btn-delete" onclick="return confirm('Hapus studio ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; endif; ?>
        </table>
    </div>
</body>
</html>
