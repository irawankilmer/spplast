<?php 

    $data  = selectDataJoin("SELECT siswa.*, kelas.namaKelas, spp.tahun FROM siswa INNER JOIN kelas ON siswa.idKelas = kelas.idKelas INNER JOIN spp ON siswa.idSpp = spp.idSpp");
    $no = 1;

?>
<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="index.php?url=siswaAdd" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
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
                </thead>
                <tfoot>
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
                </tfoot>
                <tbody>
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
                                <a href="index.php?url=siswaEdit&&id=<?= $a['idSiswa']; ?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-edit"></i></a> 
                                <a href="index.php?url=siswaHapus&&id=<?= $a['idSiswa']; ?>" onclick="return(confirm('Yakin?'))" class="btn btn-danger btn-circle">
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