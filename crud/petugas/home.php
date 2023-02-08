<?php 

    $data  = selectData('petugas', 'idPetugas');
    $no = 1;

?>
<hr>
<a href="index.php?url=petugasAdd">Tambah Data</a>
<hr>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>#</td>
        <td>Username</td>
        <td>Nama Lengkap</td>
        <td>Level</td>
        <td>Tindakan</td>
    </tr>
    <?php foreach ($data as $a): ?>
        <tr>
            <td><?= $no;  ?></td>
            <td> <?= $a['username']; ?> </td>
            <td> <?= $a['namaPetugas']; ?> </td>
            <td> <?= $a['level']; ?> </td>
            <td>
                <a href="index.php?url=petugasEdit&&id=<?= $a['idPetugas']; ?>">Edit</a> | 
                <a href="index.php?url=petugasHapus&&id=<?= $a['idPetugas']; ?>" onclick="return(confirm('Yakin?'))">Hapus</a> | 
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach ?>
</table>