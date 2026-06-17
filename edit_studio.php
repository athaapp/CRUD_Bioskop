<?php
include "koneksi.php";
$id = $_GET['id_studio'];
$query = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio=$id");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Edit Studio</h1>
            <form method="POST" action="action_studio.php?id_studio=<?= $id ?>">
                <input type="text" name="nama_studio" placeholder="Nama Studio" value="<?= htmlspecialchars($row['nama_studio']) ?>" required maxlength="50">
                <input type="number" name="kapasitas" placeholder="Kapasitas (jumlah kursi)" value="<?= $row['kapasitas'] ?>" min="1" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="studio.php">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
