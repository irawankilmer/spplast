<?php 

session_start();
require_once("../functions.php");
 require_once("../dompdf/autoload.inc.php");
 use Dompdf\Dompdf;
 $no = 1;

    
    $idSiswa = $_GET['id'];
    $siswa = selectDataJoin("SELECT siswa.*, kelas.*, spp.* FROM siswa
                                                            INNER JOIN kelas ON siswa.idKelas = kelas.idKelas
                                                            INNER JOIN spp ON siswa.idSpp = spp.idSpp
                                                            WHERE siswa.idSiswa = $idSiswa");
    $spp = selectDataJoin("SELECT pembayaran.*, spp.* FROM pembayaran
                                                        INNER JOIN spp ON pembayaran.idSpp = spp.idSpp 
                                                        WHERE idsiswa = $idSiswa");
$html="<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>";

$html .="<h1>SMK ASSALAM SAMARANG</h1>
<hr><h2>Buku SPP ".$siswa[0]['nama']."</h2><hr>

Nisn: ".$siswa[0]['nisn']."<br>".
"Nis: ".$siswa[0]['nis']."<br>".
"Kelas: ".$siswa[0]['namaKelas']."<br>".
"Jurusan: ".$siswa[0]['kompetensiKeahlian']."<br><hr>
<h3>Histori Pembayaran[TAHUNAN]</h3><hr>";

$html .="<table border='1' cellpadding='10' cellspacing='0'>
<tr>
    <td>#</td>
    <td>Bulan</td>
    <td>Tahun SPP</td>
    <td>Tahun di Bayar</td>
    <td>Tanggal di Bayar</td>
    <td>Status</td></tr>
";

foreach ($spp as $s) {
    $html .= "
        <tr>
            <td>".$no."</td>
            <td>".$s['blnDiBayar']."</td>
            <td>".$s['tahun']."</td>
            <td>";
                if ($s['jumlahBayar'] == 0) {
                    $html .= "---";
                } else {
                    $html .= $s['ThnDiBayar'];
                }
            $html .="</td>";

            $html .="<td>";
                if ($s['jumlahBayar'] == 0) {
                    $html .= "---";
                } else {
                    $html .= $s['tglBayar'];
                }
            $html .="</td>";

            $html .="<td>";
                if ($s['jumlahBayar'] == 0) {
                    $html .= "Belum di Bayar";
                } elseif($s['jumlahBayar'] > 0 && $s['jumlahBayar'] < $s['nominal']) {
                    $html .= "Belum Lunas";
                } elseif($s['jumlahBayar'] == $s['nominal'] || $s['jumlahBayar'] >= $s['nominal']) {
                    $html .= "Lunas";
                }
            $html .="</td>";

    $html .= "</tr>";
    $no++;
}


$html .="</table></body>
</html>";

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
?>