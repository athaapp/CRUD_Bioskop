<?php

include "koneksi.php";
$id = $_GET['id_film'];
$query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film=$id");
$user = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit film</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="formwrapper">
            <h1>Edit film</h1>
            <form method="POST" action="action.php?id_film=<?= $id ?>">
                <input type="text" name="judul" placeholder="Nama film" value="<?= $user ['judul'] ?>" required>
                <select name="genre" required>
                    <option value=  "      " disabled selected>Pilih Genre</option>
                    <option value=  "Action"  value="Action" <?= $user['genre'] == 'Action' ? 'selected' : '' ?> >Action</option>
                    <option value=  "Comedy"  value="Comedy" <?= $user['genre'] == 'Comedy' ? 'selected' : '' ?>    >Comedy</option>
                    <option value=  "Romance" value="Romance" <?= $user['genre'] == 'Romance' ? 'selected' : '' ?>    >Romance</option>
                    <option value=  "Horror"  value="Horror" <?= $user['genre'] == 'Horror' ? 'selected' : '' ?>   >Horror</option>
                    <option value=  "Drama"   value="Drama" <?= $user['genre'] == 'Drama' ? 'selected' : '' ?>     >Drama</option>
                    <option value=  "Animation" value="Animation" <?= $user['genre'] == 'Animation' ? 'selected' : '' ?>  >Animation</option>
                </select>
                <input type="text" name="durasi" placeholder="Durasi (dalam menit)" value="<?= $user ['durasi'] ?>" required>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="index.php">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>