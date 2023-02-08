<?php 


$id = $_GET['id'];


if (hapusData('siswa', 'idSiswa', $id) > 0) {
	echo "<script>
			alert('Data berhasil di hapus'),
			window.location.href='index.php?url=siswa'
		</script>";
}

 ?>