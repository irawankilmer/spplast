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

 <form action="" method="post">
 	<input type="text" name="tahun"><br>
 	<input type="text" name="nominal"><br>
 	<input type="submit" name="tambah" value="tambah">
 </form>