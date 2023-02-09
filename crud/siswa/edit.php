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

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Edit Data Siswa</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="nis">nis</label>
		    	<input class="form-control" id="nis" type="text" name="nis" value="<?= $data['nis']; ?>">
		    </div>

		    <div class="form-group">
		    	<label for="nama">nama</label>
		    	<input class="form-control" id="nama" type="text" name="nama" value="<?= $data['nama']; ?>">
		    </div>

		    <div class="form-group"><label for="alamat">Alamat</label>
		    	<textarea name="alamat" class="form-control" id="alamat" rows="3"><?= $data['alamat']; ?></textarea>
		    </div>

		    <div class="form-group">
		    	<label for="noTelepon">no Telepon</label>
		    	<input class="form-control" id="noTelepon" type="text" name="noTelepon" value="<?= $data['noTelepon']; ?>">
		    </div>

		    <input type="submit" name="edit" value="edit" class="btn btn-warning">
		    
		</form>
		</div>
	</div>
</div>
