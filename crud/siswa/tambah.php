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

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Tambah Data Siswa</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="nisn">nisn</label>
		    	<input class="form-control" id="nisn" type="text" name="nisn">
		    </div>

		    <div class="form-group">
		    	<label for="nis">nis</label>
		    	<input class="form-control" id="nis" type="text" name="nis">
		    </div>

		    <div class="form-group">
		    	<label for="nama">nama</label>
		    	<input class="form-control" id="nama" type="text" name="nama">
		    </div>

		    <div class="form-group">
		        <label for="kelas">Kelas</label>
		        <select class="form-control" id="kelas" name="kelas">
		            <?php foreach ($kelas as $k): ?>
			 			<option value="<?= $k['idKelas']; ?>"><?= $k['namaKelas']; ?></option>
			 		<?php endforeach ?>
		        </select>
		    </div>

		    <div class="form-group"><label for="alamat">Alamat</label>
		    	<textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
		    </div>

		    <div class="form-group">
		    	<label for="noTelepon">no Telepon</label>
		    	<input class="form-control" id="noTelepon" type="text" name="noTelepon">
		    </div>

		    <div class="form-group">
		        <label for="spp">Tahun spp</label>
		        <select class="form-control" id="spp" name="spp">
		            <?php foreach ($spp as $s): ?>
			 			<option value="<?= $s['idSpp']; ?>"><?= $s['tahun']; ?></option>
			 		<?php endforeach ?>
		        </select>
		    </div>

		    <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
		    
		</form>
		</div>
	</div>
</div>