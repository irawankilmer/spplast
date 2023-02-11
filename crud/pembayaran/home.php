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
<h1 class="h3 mb-2 text-gray-800">Pembayaran SPP</h1>
<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Pencarian Data Siswa</h4>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="form-group">
				<input class="form-control" type="text" name="nisn" placeholder="Masukan NISN Siswa">
				<input type="submit" class="btn btn-info" name="cari" value="cari">
			</div>
		</form>
	</div>
</div>


<?php if (isset($data)): ?>
<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Biodata</h4>
	</div>
	
	<div class="card-body">
		<label>Nisn :</label> <?= $data['nisn'];?><br>
		<label>Nis :</label> <?= $data['nis'];?><br>
		<label>Nama :</label> <?= $data['nama'];?><br>
		<label>namaKelas :</label> <?= $data['namaKelas'];?><br>
		<label>kompetensi :</label> <?= $data['kompetensiKeahlian'];?><br>
		<label>alamat :</label> <?= $data['alamat'];?><br>
		<label>noTelepon :</label> <?= $data['noTelepon'];?><br>
		<label>tahun :</label> <?= $data['tahun'];?>
	</div>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-header py-3">
		<h4>Buku SPP</h4>
		<?php if ($_SESSION['level'] == 'admin'): ?>
			<a href="report/cetak.php?id=<?= $data['idSiswa']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-download"></i> Cetak Buku SPP
			</a>
		<?php endif ?>
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
				<td>Tindakan</td>
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
				<td>Tindakan</td>
			</tr>
		</tfoot>

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
							<a class="btn btn-success" href="index.php?url=bayarlunas&&id=<?= $s['idPembayaran']; ?>">Bayar</a>
						<?php elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] <= $s['nominal']): ?>
							<a class="btn btn-primary" href="index.php?url=bayarlunas&&id=<?= $s['idPembayaran']; ?>">Bayar Lunas</a>
						<?php elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']): ?>
							<a class="btn btn-info" href="index.php?url=sppdetail&&id=<?= $s['idPembayaran']; ?>">Detail</a>
						<?php endif ?>
					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach ?>
		</table>

	</div>
</div>

<?php endif ?>