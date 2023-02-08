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

 <form action="" method="post">
 	<input type="text" name="tahun" value="<?= $data['tahun']; ?>"><br>
 	<input type="text" name="nominal" value="<?= $data['nominal']; ?>"><br>
 	<input type="submit" name="edit" value="edit">
 </form>