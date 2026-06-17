<?php
include "koneksi.php";
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
    <title>Beli Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Beli Tiket</h1>
            <form method="POST" action="action_tiket.php">
                <input type="text" name="nama_pembeli" placeholder="Nama Pembeli" required maxlength="100">
                <select name="id_jadwal" required>
                    <option value="" disabled selected>Pilih Jadwal Film</option>
                    <?php while ($j = mysqli_fetch_assoc($jadwals)): ?>
                    <option value="<?= $j['id_jadwal'] ?>">
                        <?= htmlspecialchars($j['judul']) ?> - <?= htmlspecialchars($j['nama_studio']) ?> | <?= date('d-m-Y', strtotime($j['tanggal'])) ?> <?= substr($j['jam_tayang'], 0, 5) ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                <input type="number" name="jumlah_tiket" placeholder="Jumlah Tiket" min="1" max="10" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="add">Beli</button>
                    <a href="tiket.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
