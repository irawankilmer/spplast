<?php

session_start();

require 'functions.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    require 'header.php';

    switch ($url) {
        case 'home':
            require 'home.php';
            break;

        // Kelas
        case 'kelas':
            require 'crud/kelas/home.php';
            break;

        case 'kelasAdd':
            require 'crud/kelas/tambah.php';
            break;

        case 'kelasHapus':
            require 'crud/kelas/hapus.php';
            break;

        case 'kelasEdit':
            require 'crud/kelas/edit.php';
            break;
        // End Kelas

        // Spp
        case 'spp':
            require 'crud/spp/home.php';
            break;

        case 'sppAdd':
            require 'crud/spp/tambah.php';
            break;

        case 'sppHapus':
            require 'crud/spp/hapus.php';
            break;

        case 'sppEdit':
            require 'crud/spp/edit.php';
            break;
        // End Spp

        // petugas
        case 'petugas':
            require 'crud/petugas/home.php';
            break;

        case 'petugasAdd':
            require 'crud/petugas/tambah.php';
            break;

        case 'petugasHapus':
            require 'crud/petugas/hapus.php';
            break;

        case 'petugasEdit':
            require 'crud/petugas/edit.php';
            break;
        // End petugas

        // siswa
        case 'siswa':
            require 'crud/siswa/home.php';
            break;

        case 'siswaAdd':
            require 'crud/siswa/tambah.php';
            break;

        case 'siswaHapus':
            require 'crud/siswa/hapus.php';
            break;

        case 'siswaEdit':
            require 'crud/siswa/edit.php';
            break;
        // End siswa

        // pembayaran
        case 'pembayaran':
            require 'crud/pembayaran/home.php';
            break;

        case 'bayarlunas':
            require 'crud/pembayaran/bayarlunas.php';
            break;

        case 'sppdetail':
            require 'crud/pembayaran/detail.php';
            break;
        // End pembayaran

        default:
            require '404.php';
            break;
        
        }
        
    require 'footer.php';

    exit();
}

require 'auth/login.php';

?>