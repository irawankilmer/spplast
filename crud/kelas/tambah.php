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

 <form action="" method="post">
 	<input type="text" name="namaKelas"><br>
 	<input type="text" name="kompetensiKeahlian"><br>
 	<input type="submit" name="tambah" value="tambah">
 </form>