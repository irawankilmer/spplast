<?php 


$id = $_GET['id'];


if (hapusData('petugas', 'idPetugas', $id) > 0) {
	echo "<script>
			alert('Data berhasil di hapus'),
			window.location.href='index.php?url=petugas'
		</script>";
}

 ?>