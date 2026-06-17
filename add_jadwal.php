<?php
include "koneksi.php";
$films   = mysqli_query($koneksi, "SELECT * FROM film ORDER BY judul");
$studios = mysqli_query($koneksi, "SELECT * FROM studio ORDER BY nama_studio");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Tambah Jadwal</h1>
            <form method="POST" action="action_jadwal.php">
                <select name="id_film" required>
                    <option value="" disabled selected>Pilih Film</option>
                    <?php while ($f = mysqli_fetch_assoc($films)): ?>
                    <option value="<?= $f['id_film'] ?>"><?= htmlspecialchars($f['judul']) ?></option>
                    <?php endwhile; ?>
                </select>
                <select name="id_studio" required>
                    <option value="" disabled selected>Pilih Studio</option>
                    <?php while ($s = mysqli_fetch_assoc($studios)): ?>
                    <option value="<?= $s['id_studio'] ?>"><?= htmlspecialchars($s['nama_studio']) ?> (<?= $s['kapasitas'] ?> kursi)</option>
                    <?php endwhile; ?>
                </select>
                <input type="date" name="tanggal" required>
                <input type="time" name="jam_tayang" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="add">Tambah</button>
                    <a href="jadwal.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
