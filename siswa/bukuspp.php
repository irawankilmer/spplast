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

	<h1>Biodata</h1>
		<hr>
		<label>Nisn :</label> <?= $siswa[0]['nisn'];?><br>
		<label>Nis :</label> <?= $siswa[0]['nis'];?><br>
		<label>Nama :</label> <?= $siswa[0]['nama'];?><br>
		<label>namaKelas :</label> <?= $siswa[0]['namaKelas'];?><br>
		<label>kompetensi :</label> <?= $siswa[0]['kompetensiKeahlian'];?><br>
		<label>alamat :</label> <?= $siswa[0]['alamat'];?><br>
		<label>noTelepon :</label> <?= $siswa[0]['noTelepon'];?><br>
		<label>tahun :</label> <?= $siswa[0]['tahun'];?>
		<br>
		<br>
		<hr>
		<h1>Buku SPP</h1>
		<a href="report/cetak.php?id=<?= $siswa[0]['idSiswa']; ?>">Cetak Buku SPP</a>
		<hr>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td>#</td>
				<td>Bulan</td>
				<td>Tahun SPP</td>
				<td>Tahun Dibayar</td>
				<td>Tanggal Di Bayar</td>
				<td>Status</td>
			</tr>

			<?php foreach ($spp as $s): ?>
				<tr>
					<td><?= $no; ?></td>
					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							<?= $s['blnDiBayar']; ?>
						<?php elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] < $s['nominal']): ?>
							<?= $s['blnDiBayar']; ?>
						<?php elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']): ?>
							<a href="index.php?url=sppdetail&&id=<?= $s['idPembayaran']; ?>"><?= $s['blnDiBayar']; ?></a>
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
