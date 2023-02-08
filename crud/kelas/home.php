<?php 

    $data  = selectData('kelas', 'idKelas');
    $no = 1;

?>
<hr>
<a href="index.php?url=kelasAdd">Tambah Data</a>
<hr>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>#</td>
        <td>Nama Kelas</td>
        <td>Kompetensi Keahlian</td>
        <td>Tindakan</td>
    </tr>
    <?php foreach ($data as $a): ?>
        <tr>
            <td><?= $no;  ?></td>
            <td> <?= $a['namaKelas']; ?> </td>
            <td> <?= $a['kompetensiKeahlian']; ?> </td>
            <td>
                <a href="index.php?url=kelasEdit&&id=<?= $a['idKelas']; ?>">Edit</a> | 
                <a href="index.php?url=kelasHapus&&id=<?= $a['idKelas']; ?>" onclick="return(confirm('Yakin?'))">Hapus</a> | 
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach ?>
</table>