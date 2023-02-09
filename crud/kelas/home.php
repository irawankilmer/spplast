<?php 

    $data  = selectData('kelas', 'idKelas');
    $no = 1;

?>
<h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?url=kelasAdd" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Tindakan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $a): ?>
                        <tr>
                            <td><?= $no;  ?></td>
                            <td> <?= $a['namaKelas']; ?> </td>
                            <td> <?= $a['kompetensiKeahlian']; ?> </td>
                            <td>
                                <a href="index.php?url=kelasEdit&&id=<?= $a['idKelas']; ?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?url=kelasHapus&&id=<?= $a['idKelas']; ?>" onclick="return(confirm('Yakin?'))" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
