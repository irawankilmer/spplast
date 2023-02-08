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

        default:
            require '404.php';
            break;
        
        }
        
    require 'footer.php';

    exit();
}

require 'auth/login.php';

?>