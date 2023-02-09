<?php 

	if (isset($_POST['tambah'])) {
		$tahun	= htmlspecialchars($_POST['tahun']);
		$nominal	= htmlspecialchars($_POST['nominal']);

		if (query("INSERT INTO spp VALUES('', '$tahun', '$nominal')") > 0) {
			echo "<script>
			alert('Data berhasil di tambahkan'),
			window.location.href='index.php?url=spp'
			</script>";
		}
	}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Tambah Data SPP</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="tahun">Tahun SPP</label>
		    	<input class="form-control" id="tahun" type="text" name="tahun">
		    </div>

		    <div class="form-group">
		    	<label for="nominal">Nominal</label>
		    	<input class="form-control" id="nominal" type="text" name="nominal">
		    </div>

		    <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
		    
		</form>
		</div>
	</div>
</div>