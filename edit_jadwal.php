<?php
include "koneksi.php";
$id      = (int) $_GET['id_jadwal'];
$q       = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal=$id");
$jadwal  = mysqli_fetch_assoc($q);
$films   = mysqli_query($koneksi, "SELECT * FROM film ORDER BY judul");
$studios = mysqli_query($koneksi, "SELECT * FROM studio ORDER BY nama_studio");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Edit Jadwal</h1>
            <form method="POST" action="action_jadwal.php?id_jadwal=<?= $id ?>">
                <select name="id_film" required>
                    <option value="" disabled>Pilih Film</option>
                    <?php while ($f = mysqli_fetch_assoc($films)): ?>
                    <option value="<?= $f['id_film'] ?>" <?= $jadwal['id_film'] == $f['id_film'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($f['judul']) ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                <select name="id_studio" required>
                    <option value="" disabled>Pilih Studio</option>
                    <?php while ($s = mysqli_fetch_assoc($studios)): ?>
                    <option value="<?= $s['id_studio'] ?>" <?= $jadwal['id_studio'] == $s['id_studio'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($s['nama_studio']) ?> (<?= $s['kapasitas'] ?> kursi)
                    </option>
                    <?php endwhile; ?>
                </select>
                <input type="date" name="tanggal" value="<?= $jadwal['tanggal'] ?>" required>
                <input type="time" name="jam_tayang" value="<?= substr($jadwal['jam_tayang'], 0, 5) ?>" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="jadwal.php">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
