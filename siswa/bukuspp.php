<?php 

$no = 1;

	
	$idSiswa = $_SESSION['idSiswa'];
	$siswa = selectDataJoin("SELECT siswa.*, kelas.*, spp.* FROM siswa
															INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
															INNER JOIN spp ON siswa.idSpp = spp.idSpp
															WHERE siswa.idSiswa = $idSiswa");
	$spp = selectDataJoin("SELECT pembayaran.*, spp.* FROM pembayaran
														INNER JOIN spp ON pembayaran.idSpp = spp.idSpp 
														WHERE idsiswa = $idSiswa");

 ?>


 <div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Biodata</h4>
	</div>
	
	<div class="card-body">
		<label>Nisn :</label> <?= $siswa[0]['nisn'];?><br>
		<label>Nis :</label> <?= $siswa[0]['nis'];?><br>
		<label>Nama :</label> <?= $siswa[0]['nama'];?><br>
		<label>namaKelas :</label> <?= $siswa[0]['namaKelas'];?><br>
		<label>kompetensi :</label> <?= $siswa[0]['kompetensiKeahlian'];?><br>
		<label>alamat :</label> <?= $siswa[0]['alamat'];?><br>
		<label>noTelepon :</label> <?= $siswa[0]['noTelepon'];?><br>
		<label>tahun :</label> <?= $siswa[0]['tahun'];?>
	</div>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Buku SPP</h4>
		<a href="report/cetak.php?id=<?= $siswa[0]['idSiswa']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<i class="fas fa-download"></i> Cetak Buku SPP
		</a>
	</div>

	<div class="card-body">
		
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<td>#</td>
				<td>Bulan</td>
				<td>Tahun SPP</td>
				<td>Tahun Dibayar</td>
				<td>Tanggal Di Bayar</td>
				<td>Status</td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>#</td>
				<td>Bulan</td>
				<td>Tahun SPP</td>
				<td>Tahun Dibayar</td>
				<td>Tanggal Di Bayar</td>
				<td>Status</td>
			</tr>
		</tfoot>

			<?php foreach ($spp as $s): ?>
				<tr>
					<td><?= $no; ?></td>
					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							<?= $s['blnDiBayar']; ?>
						<?php elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] < $s['nominal']): ?>
							<?= $s['blnDiBayar']; ?>
						<?php elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']): ?>
							<a class="btn btn-info" href="index.php?url=sppdetail&&id=<?= $s['idPembayaran']; ?>"><?= $s['blnDiBayar']; ?></a>
						<?php endif ?>
					</td>
					<td><?= $s['tahun']; ?></td>
					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							---------
						<?php else: ?>
							<?= $s['ThnDiBayar']; ?>
						<?php endif ?>
					</td>
					
					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							---------
						<?php else: ?>
							<?= $s['tglBayar']; ?>
						<?php endif ?>
					</td>


					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							belum dibayar
						<?php elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] < $s['nominal']): ?>
							Belum Lunas
						<?php elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']): ?>
							Lunas
						<?php endif ?>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach ?>
		</table>

	</div>
</div>