<?php 

$kelas = selectData('kelas', 'idKelas');
$spp   = selectData('spp', 'idSpp');

	if (isset($_POST['tambah'])) {
		$nisn = htmlspecialchars($_POST['nisn']);
		if (cekData('siswa', 'nisn', $nisn) > 0) {
			echo "<script>
					alert('Maaf, Nisn sudah terdaftar'),
					window.location.href='index.php?url=siswaAdd'
				</script>";
		} else {
			
			if (insertSiswaSpp($_POST) > 0) {
				echo "<script>
					alert('Data berhasil di tambahkan'),
					window.location.href='index.php?url=siswa'
				</script>";
			}

			var_dump(mysqli_insert_id($conn));

			

			

		}
	}

 ?>

 <form action="" method="post">
 	<label for="nisn">NISN</label>
 	<input type="text" name="nisn" id="nisn"><br>

 	<label for="nis">NIS</label>
 	<input type="text" name="nis" id="nis"><br>

 	<label for="nama">Nama</label>
 	<input type="text" name="nama" id="nama"><br>

 	<label for="kelas">Kelas</label>
 	<select name="kelas">
 		<?php foreach ($kelas as $k): ?>
 			<option value="<?= $k['idKelas']; ?>"><?= $k['namaKelas']; ?></option>
 		<?php endforeach ?>
 	</select><br>

 	<label for="alamat">Alamat</label>
 	<textarea name="alamat" id="alamat"></textarea><br>

 	<label for="noTelepon">no Telepon</label>
 	<input type="text" name="noTelepon" id="noTelepon"><br>

 	<label for="spp">Tahun Spp</label>
 	<select name="spp">
 		<?php foreach ($spp as $s): ?>
 			<option value="<?= $s['idSpp']; ?>"><?= $s['tahun']; ?></option>
 		<?php endforeach ?>
 	</select><br>

 	<input type="submit" name="tambah" value="tambah">
 </form>