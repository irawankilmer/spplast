<a href="index.php?url=home">Home</a> | 
<?php if($_SESSION['level'] === 'admin') : ?>
    <a href="index.php?url=kelas">Kelas</a> | 
    <a href="index.php?url=siswa">siswa</a> | 
    <a href="index.php?url=spp">Spp</a> |
    <a href="index.php?url=petugas">Petugas</a> | 
<?php endif ?>

<?php if($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'petugas') : ?>
    <a href="index.php?url=pembayaran">Pembayaran</a>
<?php endif ?>

| <a href="auth/logout.php">Logout</a>

<br>
<hr>