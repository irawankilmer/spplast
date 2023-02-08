<?php 

$no = 1;

if (isset($_POST['cari'])) {
	$nisn = $_POST['nisn'];
	$query = "SELECT siswa.*, spp.*, kelas.* FROM siswa INNER JOIN kelas ON siswa.idKelas = kelas.idKelas 
														INNER JOIN spp ON siswa.idSpp = spp.idSpp 
											WHERE nisn LIKE '$nisn'";
	$data = mysqli_query($conn, $query);

	$data = mysqli_fetch_assoc($data);

	if (!empty($data['idSiswa'])) {
		$idSiswa = $data['idSiswa'];
		$spp = selectDataJoin("SELECT pembayaran.*, spp.* FROM pembayaran 
													INNER JOIN spp ON pembayaran.idSpp = spp.idSpp 
													WHERE idsiswa = $idSiswa");
		$cek = true;
	}

}


 ?>

<form action="" method="post">
	<label for="nisn">Masukan NISN</label>
	<input type="text" name="nisn" id="nisn">
	<input type="submit" name="cari" value="cari">
</form>

<?php if (isset($data)): ?>
	<h1>Biodata</h1>
		<hr>
		<label>Nisn :</label> <?= $data['nisn'];?><br>
		<label>Nis :</label> <?= $data['nis'];?><br>
		<label>Nama :</label> <?= $data['nama'];?><br>
		<label>namaKelas :</label> <?= $data['namaKelas'];?><br>
		<label>kompetensi :</label> <?= $data['kompetensiKeahlian'];?><br>
		<label>alamat :</label> <?= $data['alamat'];?><br>
		<label>noTelepon :</label> <?= $data['noTelepon'];?><br>
		<label>tahun :</label> <?= $data['tahun'];?>
		<br>
		<br>
		<hr>
		<h1>Buku SPP</h1>
		<hr>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td>#</td>
				<td>Bulan</td>
				<td>Tahun SPP</td>
				<td>Tahun Dibayar</td>
				<td>Tanggal Di Bayar</td>
				<td>Status</td>
				<td>Tindakan</td>
			</tr>

			<?php foreach ($spp as $s): ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $s['blnDiBayar']; ?></td>
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

					<td>
						<?php if ($s['jumlahBayar'] == 0): ?>
							<a href="index.php?url=bayarlunas&&id=<?= $s['idPembayaran']; ?>">Bayar</a>
						<?php elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] < $s['nominal']): ?>
							<a href="index.php?url=bayarlunas&&id=<?= $s['idPembayaran']; ?>">Bayar Lunas</a>
						<?php elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']): ?>
							<a href="index.php?url=sppdetail&&id=<?= $s['idPembayaran']; ?>">Detail</a>
						<?php endif ?>
					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach ?>
		</table>

<?php endif ?>