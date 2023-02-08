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

 <form action="" method="post">
 	<input type="text" name="username" placeholder="Masukan username"><br>
 	<input type="text" name="namaPetugas" placeholder="Masukan nama lengkap"><br>

 	<label for="level">Level</label>
 	<select name="level">
 		<option value="admin">Admin</option>
 		<option value="petugas">Petugas</option>
 	</select>
 	<br>

 	<input type="password" name="password1" placeholder="Masukan password"><br>
 	<input type="password" name="password2" placeholder="Konfirmasi password"><br>

 	<input type="submit" name="tambah" value="tambah">
 </form>