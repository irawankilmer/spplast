<?php 
	$id = $_GET['id'];
	$data = selectDataJoin("SELECT pembayaran.*, siswa.*, spp.*, kelas.*
							FROM pembayaran INNER JOIN siswa ON pembayaran.idSiswa = siswa.idSiswa
											INNER JOIN spp   ON pembayaran.idSpp = spp.idSpp
											INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
							WHERE idPembayaran = $id");

	if (isset($_POST['bayar'])) {
		$idPetugas = $_SESSION['idPetugas'];
		$jumlahBayar = $_POST['jumlahBayar'];
		$tglBayar  = date('Y-m-d');
		$thnDiBayar = date('Y');
		$query = "UPDATE pembayaran SET idPetugas = '$idPetugas', jumlahBayar = '$jumlahBayar', tglBayar = '$tglBayar', thnDiBayar = '$thnDiBayar' WHERE idPembayaran = '$id'";

		if (query($query) > 0) {
			echo "<script>
					alert('Spp berhasil di bayar'),
					window.location.href='index.php?url=pembayaran'
				</script>";
		}
	}


 ?>

<h1>Buku Pembayaran SPP [<?= $data[0]['nama']; ?>]</h1>
<h2>Tahun SPP [<?= $data[0]['tahun']; ?>]</h2>
Nisn : <?= $data[0]['nisn']; ?><br>
Nis : <?= $data[0]['nis']; ?><br>
Kelas : <?= $data[0]['namaKelas']; ?><br>
Jurusan : <?= $data[0]['kompetensiKeahlian']; ?><br>
<hr>

<form action="" method="post">
	<label for="bulan">Bulan	: </label> <b><?= $data[0]['blnDiBayar']; ?></b><br>

	<label>Tanggal Bayar [*Otomatis oleh sistem] : </label> <?= date('d-m-Y'); ?><br>
	<label>Tahun di Bayar [*Otomatis oleh sistem] : </label> <?= date('Y'); ?><br>

	<label for="jumlahBayar">Jumlah Bayar</label>
	<input type="text" name="jumlahBayar" id="jumlahBayar" value="<?= $data[0]['jumlahBayar']; ?>"><br>

	<input type="submit" name="bayar" value="bayar">
</form>