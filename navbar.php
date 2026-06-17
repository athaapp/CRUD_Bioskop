<nav class="navbar">
    <div class="nav-brand">Bioskop App</div>
    <ul class="nav-links">
        <li><a href="dashboard.php" <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'class="active"' : '' ?>>Dashboard</a></li>
        <li><a href="index.php" <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'class="active"' : '' ?>>Film</a></li>
        <li><a href="studio.php" <?= basename($_SERVER['PHP_SELF']) == 'studio.php' ? 'class="active"' : '' ?>>Studio</a></li>
        <li><a href="jadwal.php" <?= basename($_SERVER['PHP_SELF']) == 'jadwal.php' ? 'class="active"' : '' ?>>Jadwal</a></li>
        <li><a href="tiket.php" <?= basename($_SERVER['PHP_SELF']) == 'tiket.php' ? 'class="active"' : '' ?>>Tiket</a></li>
    </ul>
</nav>
