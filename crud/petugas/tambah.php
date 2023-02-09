<?php 

	if (isset($_POST['tambah'])) {

		$username = $_POST['username'];

		if (cekData('petugas', 'username', $username) > 0) {
			echo "<script>
					alert('Username sudah terdaftar'),
					window.location.href='index.php?url=petugasAdd'
				</script>";
		} else {
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];

			if ($password1 != $password2) {
					echo "<script>
						alert('Konfirmasi password salah'),
						window.location.href='index.php?url=petugasAdd'
					</script>";
			} else {
				$password  = password_hash($password1, PASSWORD_DEFAULT);
				$namaPetugas = htmlspecialchars($_POST['namaPetugas']);
				$level		= $_POST['level'];

				if (query("INSERT INTO petugas VALUES('', '$username', '$password', '$namaPetugas', '$level')") > 0) {
					echo "<script>
						alert('Data berhasil di tambahkan'),
						window.location.href='index.php?url=petugas'
					</script>";
				}
			}
		}	
	}

 ?>

<div class="col-lg-6">
	<div class="card o-hidden border-0 shadow-lg my-5">
	    <div class="card-header py-3">
	        <h6>Tambah Data Petugas</h6>
	    </div>
	    <div class="card-body">
		 <form action="" method="post">
		    <div class="form-group">
		    	<label for="username">username</label>
		    	<input class="form-control" id="username" type="text" name="username">
		    </div>

		    <div class="form-group">
		    	<label for="namaPetugas">nama Petugas</label>
		    	<input class="form-control" id="namaPetugas" type="text" name="namaPetugas">
		    </div>

		    <div class="form-group">
		        <label for="level">level</label>
		        <select class="form-control" id="level" name="level">
		            <option value="admin">Admin</option>
		            <option value="petugas">Petugas</option>
		        </select>
		    </div>

		    <div class="form-group">
		    	<label for="password1">password</label>
		    	<input class="form-control" id="password1" type="password" name="password1">
		    </div>

		    <div class="form-group">
		    	<label for="password2">Konfirmasi password</label>
		    	<input class="form-control" id="password2" type="password" name="password2">
		    </div>

		    <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
		    
		</form>
		</div>
	</div>
</div>