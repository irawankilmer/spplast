<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h1 mb-0 text-gray-800">Selamat datang <?= $_SESSION['nama']; ?></h1>
<h2 class="h2 mb-0 text-gray-800">Anda login sebagai <?= $_SESSION['level']; ?></h2>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?= hitungJumlah('siswa'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?= hitungJumlah('pembayaran'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?= hitungJumlah('kelas'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Petugas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?= hitungJumlah('petugas'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-child fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>