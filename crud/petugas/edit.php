<?php 

$id  = $_GET['id'];
$data = selectWhere('petugas', 'idpetugas', $id);

if (isset($_POST['edit'])) {
	$namaPetugas	= htmlspecialchars($_POST['namaPetugas']);

	if (query("UPDATE petugas SET namaPetugas = '$namaPetugas' WHERE idPetugas = $id") > 0) {
		echo "<script>
			alert('Data berhasil di edit'),
			window.location.href='index.php?url=petugas'
		</script>";
	}
}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Tambah Data Petugas</h6>
	        <p style="color:red;">*Admin hanya bisa di edit nama saja</p>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="namaPetugas">nama Petugas</label>
		    	<input class="form-control" id="namaPetugas" type="text" name="namaPetugas" value="<?= $data['namaPetugas']; ?>">
		    </div>

		    <input type="submit" name="edit" value="edit" class="btn btn-warning">
		    
		</form>
		</div>
	</div>
</div>