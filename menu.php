
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?url=home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPP <sup>Online</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?url=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Menu</span>
                </a>

            <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <?php if($_SESSION['level'] === 'admin') : ?>
                    <a class="collapse-item" href="index.php?url=kelas">Kelas</a>
                    <a class="collapse-item" href="index.php?url=spp">spp</a>
                    <a class="collapse-item" href="index.php?url=siswa">siswa</a>
                    <a class="collapse-item" href="index.php?url=petugas">petugas</a>
                <?php endif ?>
            
                <?php if($_SESSION['level'] === 'siswa') : ?>
                <a class="collapse-item" href="index.php?url=bukuspp">Buku SPP</a>
                <?php endif ?>

                <?php if($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'petugas') : ?>
                    <a class="collapse-item" href="index.php?url=pembayaran">pembayaran</a>
                <?php endif ?>
                </div>
            </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
