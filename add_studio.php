<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Tambah Studio</h1>
            <form method="POST" action="action_studio.php">
                <input type="text" name="nama_studio" placeholder="Nama Studio" required maxlength="50">
                <input type="number" name="kapasitas" placeholder="Kapasitas (jumlah kursi)" min="1" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="add">Tambah</button>
                    <a href="studio.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
