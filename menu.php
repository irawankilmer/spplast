<a href="index.php?url=home">Home</a> | 
<?php if($_SESSION['level'] === 'admin') : ?>
    <a href="index.php?url=kelas">Kelas</a> | siswa | SPP |
<?php endif ?>

<?php if($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'petugas') : ?>
    Pembayaran
<?php endif ?>

| <a href="auth/logout.php">Logout</a>

<br>
<hr>