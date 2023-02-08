<?php 
session_start();
require '../functions.php';
require_once("../dompdf/autoload.inc.php");
 use Dompdf\Dompdf;
	$id = $_GET['id'];
	$data = selectDataJoin("SELECT pembayaran.*, siswa.*, spp.*, kelas.*, petugas.*
							FROM pembayaran INNER JOIN siswa ON pembayaran.idSiswa = siswa.idSiswa
											INNER JOIN petugas ON pembayaran.idPetugas = petugas.idPetugas
											INNER JOIN spp   ON pembayaran.idSpp = spp.idSpp
											INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
							WHERE idPembayaran = $id");


 $html .="

<h1>SMK ASSALAM SAMARANG</h1>
<hr>
<h2>Buku Pembayaran SPP [".$data[0]['nama']. "]</h2>
<h2>Tahun SPP [". $data[0]['tahun']."]</h2>
<h2>Bulan [". $data[0]['blnDiBayar']. "]</h2>
<h2>Status [LUNAS]</h2>
<h2>Petugas Pembayaran [". $data[0]['namaPetugas'] ."]</h2>

<hr>
<u><h3>Profil</h3></u>
Nama : ". $data[0]['nama'] ."<br>
Nisn : ". $data[0]['nisn'] ."<br>
Nis : ". $data[0]['nis'] ."<br>
Kelas : ". $data[0]['namaKelas'] ."<br>
Jurusan : ". $data[0]['kompetensiKeahlian'];
$html .= "<br>
<hr>";

$namefile = time();
$dompdf = new DOMPDF();
$dompdf->set_paper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//buat page number
        $font = $dompdf->getFontMetrics()->get_font("Arial", "bold");
        $dompdf->getCanvas()->page_text(420, 550, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 10, array(0,0,0));
ob_end_clean();

$dompdf->stream(''.$namefile, array('Attachment'=>0));
$output = $dompdf->output();
file_put_contents('directory/'.$namefile, $output);