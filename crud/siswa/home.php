<?php 

    $data  = selectDataJoin("SELECT siswa.*, kelas.namaKelas, spp.tahun FROM siswa INNER JOIN kelas ON siswa.idKelas = kelas.idKelas INNER JOIN spp ON siswa.idSpp = spp.idSpp");
    $no = 1;

?>
<hr>
<a href="index.php?url=siswaAdd">Tambah Data</a>
<hr>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>#</td>
        <td>Nisn</td>
        <td>Nis</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Alamat</td>
        <td>No Telepon</td>
        <td>SPP</td>
        <td>Tindakan</td>
    </tr>
    <?php foreach ($data as $a): ?>
        <tr>
            <td><?= $no;  ?></td>
            <td> <?= $a['nisn']; ?> </td>
            <td> <?= $a['nis']; ?> </td>
            <td> <?= $a['nama']; ?> </td>
            <td> <?= $a['namaKelas']; ?> </td>
            <td> <?= $a['alamat']; ?> </td>
            <td> <?= $a['noTelepon']; ?> </td>
            <td> <?= $a['tahun']; ?> </td>
            <td>
                <a href="index.php?url=siswaEdit&&id=<?= $a['idSiswa']; ?>">Edit</a> | 
                <a href="index.php?url=siswaHapus&&id=<?= $a['idSiswa']; ?>" onclick="return(confirm('Yakin?'))">Hapus</a> | 
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach ?>
</table>