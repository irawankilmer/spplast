<?php 

    $data  = selectData('spp', 'idSpp');
    $no = 1;

?>
<hr>
<a href="index.php?url=sppAdd">Tambah Data</a>
<hr>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>#</td>
        <td>Tahun</td>
        <td>Nominal</td>
        <td>Tindakan</td>
    </tr>
    <?php foreach ($data as $a): ?>
        <tr>
            <td><?= $no;  ?></td>
            <td> <?= $a['tahun']; ?> </td>
            <td> <?= $a['nominal']; ?> </td>
            <td>
                <a href="index.php?url=sppEdit&&id=<?= $a['idSpp']; ?>">Edit</a> | 
                <a href="index.php?url=sppHapus&&id=<?= $a['idSpp']; ?>" onclick="return(confirm('Yakin?'))">Hapus</a> | 
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach ?>
</table>