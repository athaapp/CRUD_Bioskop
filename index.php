<?php
include "koneksi.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

if ($search) {
    $query = mysqli_query($koneksi, "SELECT * FROM film WHERE judul LIKE '%$search%' OR genre LIKE '%$search%'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM film");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film - Bioskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <h1>Data Film Bioskop</h1>

        <div class="toolbar">
            <a href="add.php">+ Tambah Film</a>
            <form method="GET" action="index.php" class="search-form">
                <input type="text" name="search" placeholder="Cari judul atau genre..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn-search">Cari</button>
                <?php if ($search): ?>
                    <a href="index.php" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($search): ?>
            <p class="search-info">Hasil pencarian untuk: <strong>"<?= htmlspecialchars($search) ?>"</strong></p>
        <?php endif; ?>

        <table>
            <tr>
                <th>No.</th>
                <th>Judul Film</th>
                <th>Genre</th>
                <th>Durasi (menit)</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $count = mysqli_num_rows($query);
            if ($count == 0): ?>
            <tr><td colspan="5" style="text-align:center; color:#888;">Tidak ada data ditemukan.</td></tr>
            <?php else:
            while ($user = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($user['judul']) ?></td>
                <td><span class="badge"><?= htmlspecialchars($user['genre']) ?></span></td>
                <td><?= $user['durasi'] ?> menit</td>
                <td>
                    <a href="edit.php?id_film=<?= $user['id_film'] ?>">Edit</a>
                    <a href="action.php?id_film=<?= $user['id_film'] ?>" class="btn-delete" onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; endif; ?>
        </table>
    </div>
</body>
</html>
