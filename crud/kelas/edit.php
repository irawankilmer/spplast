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

 <form action="" method="post">
 	<input type="text" name="namaKelas" value="<?= $data['namaKelas']; ?>"><br>
 	<input type="text" name="kompetensiKeahlian" value="<?= $data['kompetensiKeahlian']; ?>"><br>
 	<input type="submit" name="edit" value="edit">
 </form>