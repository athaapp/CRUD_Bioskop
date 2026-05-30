<?php

include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM film");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Data tiket bioskop</title>
   <link rel="stylesheet" href="style.css" />
</head>

<body>

   <div class ="container">
      <h1>Data film bioskop - Tes git</h1>
      <a href ="add.php">Tambah film</a>

      <table>

         <tr>
            <th>No.</th>
            <th>Judul film</th>
            <th>Genre</th>
            <th>Durasi</th>      
            <th>Aksi</th>
         </tr>
         
         <?php
         $no = 1;
         while ($user = mysqli_fetch_assoc($query)) : ?>
         <tr>
            <td><?= $no++ ?></td>
            <td><?= $user['judul'] ?></td>
            <td><?= $user['genre'] ?></td>
            <td><?= $user['durasi'] ?></td>      
            <td>
               <a href="edit.php?id_film=<?= $user['id_film'] ?>">Edit</a>
               <a href="action.php?id_film=<?= $user['id_film'] ?>" class="btn-delete" onclick= "return confirm ('Apakah kamu yakin ingin menghapus data?')">Hapus</a>
            </td>
         </tr>
         <?php endwhile; ?>
      </table>
   </div>

</body>

</html>