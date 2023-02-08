<?php 


$id = $_GET['id'];


if (hapusData('spp', 'idSpp', $id) > 0) {
	echo "<script>
			alert('Data berhasil di hapus'),
			window.location.href='index.php?url=spp'
		</script>";
}

 ?>