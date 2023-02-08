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

        default:
            require '404.php';
            break;
        
        }
        
    require 'footer.php';

    exit();
}

require 'auth/login.php';

?>