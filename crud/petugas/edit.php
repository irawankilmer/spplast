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

 <form action="" method="post">
 	<input type="text" name="namaPetugas" value="<?= $data['namaPetugas']; ?>"><br>
 	<input type="submit" name="edit" value="edit">
 </form>