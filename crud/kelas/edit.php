<?php 

$id  = $_GET['id'];
$data = selectWhere('kelas', 'idKelas', $id);

if (isset($_POST['edit'])) {
	$namaKelas	= htmlspecialchars($_POST['namaKelas']);
	$kompetensiKeahlian	= htmlspecialchars($_POST['kompetensiKeahlian']);

	if (query("UPDATE kelas SET namaKelas = '$namaKelas', kompetensiKeahlian = '$kompetensiKeahlian' WHERE idKelas = $id") > 0) {
		echo "<script>
			alert('Data berhasil di edit'),
			window.location.href='index.php?url=kelas'
		</script>";
	}
}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Edit Data Kelas</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="namaKelas">Nama Kelas</label>
		    	<input class="form-control" id="namaKelas" type="text" value="<?= $data['namaKelas']; ?>" name="namaKelas">
		    </div>

		    <div class="form-group">
		    	<label for="kompetensiKeahlian">Kompetensi Keahlian</label>
		    	<input class="form-control" id="kompetensiKeahlian" type="text" value="<?= $data['kompetensiKeahlian']; ?>" name="kompetensiKeahlian">
		    </div>

		    <input type="submit" name="edit" value="edit" class="btn btn-warning">
		    
		</form>
		</div>
	</div>
</div>