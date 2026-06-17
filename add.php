<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Tambah Film</h1>
            <form method="POST" action="action.php">
                <input type="text" name="judul" placeholder="Nama film" required maxlength="75">
                <select name="genre" required>
                    <option value="" disabled selected>Pilih Genre</option>
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Romance">Romance</option>
                    <option value="Horror">Horror</option>
                    <option value="Drama">Drama</option>
                    <option value="Animation">Animation</option>
                </select>
                <input type="number" name="durasi" placeholder="Durasi (dalam menit)" min="1" required>
                <div class="btn-box">
                    <button type="submit" name="add">Tambah</button>
                    <a href="index.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
