<?php 


$id = $_GET['id'];


if (hapusData('kelas', 'idKelas', $id) > 0) {
	echo "<script>
			alert('Data berhasil di hapus'),
			window.location.href='index.php?url=kelas'
		</script>";
}

 ?>