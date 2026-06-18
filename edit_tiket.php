<?php
include "koneksi.php";
$id     = (int) $_GET['id_tiket'];
$q      = mysqli_query($koneksi, "SELECT * FROM tiket WHERE id_tiket=$id");
$tiket  = mysqli_fetch_assoc($q);
$jadwals = mysqli_query($koneksi, "
    SELECT j.id_jadwal, f.judul, s.nama_studio, j.tanggal, j.jam_tayang
    FROM jadwal j
    JOIN film f ON j.id_film = f.id_film
    JOIN studio s ON j.id_studio = s.id_studio
    ORDER BY j.tanggal ASC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Edit Tiket</h1>
            <form method="POST" action="action_tiket.php?id_tiket=<?= $id ?>">
                <input type="text" name="nama_pembeli" placeholder="Nama Pembeli" value="<?= htmlspecialchars($tiket['nama_pembeli']) ?>" required maxlength="100">
                <select name="id_jadwal" required>
                    <option value="" disabled>Pilih Jadwal Film</option>
                    <?php while ($j = mysqli_fetch_assoc($jadwals)): ?>
                    <option value="<?= $j['id_jadwal'] ?>" <?= $tiket['id_jadwal'] == $j['id_jadwal'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($j['judul']) ?> - <?= htmlspecialchars($j['nama_studio']) ?> | <?= date('d-m-Y', strtotime($j['tanggal'])) ?> <?= substr($j['jam_tayang'], 0, 5) ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                <input type="number" name="jumlah_tiket" placeholder="Jumlah Tiket" value="<?= $tiket['jumlah_tiket'] ?>" min="1" max="10" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="tiket.php">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
