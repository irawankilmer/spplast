<?php 

$id  = $_GET['id'];
$data = selectWhere('siswa', 'idsiswa', $id);

if (isset($_POST['edit'])) {
	$nis	= htmlspecialchars($_POST['nis']);
	$nama	= htmlspecialchars($_POST['nama']);
	$alamat	= htmlspecialchars($_POST['alamat']);
	$noTelepon	= htmlspecialchars($_POST['noTelepon']);

	if (query("UPDATE siswa SET nis = '$nis', nama = '$nama', alamat = '$alamat', noTelepon = '$noTelepon' WHERE idsiswa = $id") > 0) {
		echo "<script>
			alert('Data berhasil di edit'),
			window.location.href='index.php?url=siswa'
		</script>";
	}
}

 ?>

 <form action="" method="post">
 	<label for="nis">Nis</label>
 	<input type="text" name="nis" value="<?= $data['nis']; ?>" id="nis"><br>
 	<label for="nama">nama</label>
 	<input type="text" name="nama" value="<?= $data['nama']; ?>" id="nama"><br>
 	<label for="alamat">alamat</label>
 	<input type="text" name="alamat" value="<?= $data['alamat']; ?>" id="alamat"><br>
 	<label for="noTelepon">no Telepon</label>
 	<input type="text" name="noTelepon" value="<?= $data['noTelepon']; ?>" id="noTelepon"><br>
 	<input type="submit" name="edit" value="edit">
 </form>