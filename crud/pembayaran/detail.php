<?php 
	$id = $_GET['id'];
	$data = selectDataJoin("SELECT pembayaran.*, siswa.*, spp.*, kelas.*, petugas.*
							FROM pembayaran INNER JOIN siswa ON pembayaran.idSiswa = siswa.idSiswa
											INNER JOIN petugas ON pembayaran.idPetugas = petugas.idPetugas
											INNER JOIN spp   ON pembayaran.idSpp = spp.idSpp
											INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
							WHERE idPembayaran = $id");


 ?>

<h1>Buku Pembayaran SPP [<?= $data[0]['nama']; ?>]</h1>
<h2>Tahun SPP [<?= $data[0]['tahun']; ?>]</h2>
<h2>Bulan [<?= $data[0]['blnDiBayar']; ?>]</h2>
<h2>Status [LUNAS]</h2>
<h2>Petugas Pembayaran [<?= $data[0]['namaPetugas']; ?>]</h2>

<hr>
<u><h3>Profil</h3></u>
Nama : <?= $data[0]['nama']; ?><br>
Nisn : <?= $data[0]['nisn']; ?><br>
Nis : <?= $data[0]['nis']; ?><br>
Kelas : <?= $data[0]['namaKelas']; ?><br>
Jurusan : <?= $data[0]['kompetensiKeahlian']; ?><br>
<hr>

<?php if ($_SESSION['level'] == 'siswa'): ?>
	<a href="index.php?url=bukuspp">Kembali</a> | 
<?php endif ?>

<a href="report/cetakbulanan.php?id=<?= $data[0]['idPembayaran']; ?>">Cetak</a>