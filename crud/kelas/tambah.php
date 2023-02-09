<?php 

	if (isset($_POST['tambah'])) {
		$namaKelas	= htmlspecialchars($_POST['namaKelas']);
		$kompetensiKeahlian	= htmlspecialchars($_POST['kompetensiKeahlian']);

		if (query("INSERT INTO kelas VALUES('', '$namaKelas', '$kompetensiKeahlian')") > 0) {
			echo "<script>
			alert('Data berhasil di tambahkan'),
			window.location.href='index.php?url=kelas'
			</script>";
		}
	}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Tambah Data Kelas</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="namaKelas">Nama Kelas</label>
		    	<input class="form-control" id="namaKelas" type="text" name="namaKelas">
		    </div>

		    <div class="form-group">
		    	<label for="kompetensiKeahlian">Kompetensi Keahlian</label>
		    	<input class="form-control" id="kompetensiKeahlian" type="text" name="kompetensiKeahlian">
		    </div>

		    <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
		    
		</form>
		</div>
	</div>
</div>