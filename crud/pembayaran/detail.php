<?php 
	$id = $_GET['id'];
	$data = selectDataJoin("SELECT pembayaran.*, siswa.*, spp.*, kelas.*, petugas.*
							FROM pembayaran INNER JOIN siswa ON pembayaran.idSiswa = siswa.idSiswa
											INNER JOIN petugas ON pembayaran.idPetugas = petugas.idPetugas
											INNER JOIN spp   ON pembayaran.idSpp = spp.idSpp
											INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
							WHERE idPembayaran = $id");


 ?>
<h1 class="h3 mb-2 text-gray-800">Buku SPP</h1>
<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Detail Pembayaran SPP Bulan <?= $data[0]['blnDiBayar']; ?></h4>
		<?php if ($_SESSION['level'] == 'admin'): ?>
			
		<a href="report/cetakbulanan.php?id=<?= $data[0]['idPembayaran']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<i class="fas fa-download"></i> Cetak Buku SPP
		</a>
		<?php endif ?>
	</div>

	<div class="card-body">
		<h3>Buku Pembayaran SPP [<?= $data[0]['nama']; ?>]</h3>
		<h5>Tahun SPP [<?= $data[0]['tahun']; ?>]</h5>
		<h5>Status [LUNAS]</h5>
		<h5>Petugas Pembayaran [<?= $data[0]['namaPetugas']; ?>]</h5>
	</div>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Profil Siswa</h4>
	</div>

	<div class="card-body">
		Nama : <?= $data[0]['nama']; ?><br>
		Nisn : <?= $data[0]['nisn']; ?><br>
		Nis : <?= $data[0]['nis']; ?><br>
		Kelas : <?= $data[0]['namaKelas']; ?><br>
		Jurusan : <?= $data[0]['kompetensiKeahlian']; ?><br>
	</div>
</div>
