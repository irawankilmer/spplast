<?php 

$id  = $_GET['id'];
$data = selectWhere('spp', 'idSpp', $id);

if (isset($_POST['edit'])) {
	$tahun	= htmlspecialchars($_POST['tahun']);
	$nominal	= htmlspecialchars($_POST['nominal']);

	if (query("UPDATE spp SET tahun = '$tahun', nominal = '$nominal' WHERE idSpp = $id") > 0) {
		echo "<script>
			alert('Data berhasil di edit'),
			window.location.href='index.php?url=spp'
		</script>";
	}
}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Edit Data SPP</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="tahun">Tahun SPP</label>
		    	<input class="form-control" id="tahun" type="text" name="tahun" value="<?= $data['tahun']; ?>">
		    </div>

		    <div class="form-group">
		    	<label for="nominal">Nominal</label>
		    	<input class="form-control" id="nominal" type="text" name="nominal" value="<?= $data['nominal']; ?>">
		    </div>

		    <input type="submit" name="edit" value="edit" class="btn btn-primary">
		    
		</form>
		</div>
	</div>
</div>