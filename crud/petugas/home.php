<?php 

    $data  = selectData('petugas', 'idPetugas');
    $no = 1;

?>

<h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?url=petugasAdd" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Username</td>
                        <td>Nama Lengkap</td>
                        <td>Level</td>
                        <td>Tindakan</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>#</td>
                        <td>Username</td>
                        <td>Nama Lengkap</td>
                        <td>Level</td>
                        <td>Tindakan</td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $a): ?>
                        <tr>
                            <td><?= $no;  ?></td>
                            <td> <?= $a['username']; ?> </td>
                            <td> <?= $a['namaPetugas']; ?> </td>
                            <td> <?= $a['level']; ?> </td>
                            <td>
                                <a href="index.php?url=petugasEdit&&id=<?= $a['idPetugas']; ?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i></a> 
                                <a href="index.php?url=petugasHapus&&id=<?= $a['idPetugas']; ?>" onclick="return(confirm('Yakin?'))" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>