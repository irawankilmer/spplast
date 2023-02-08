<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP - <?= $_SESSION['level']; ?></title>
</head>
<body>
    <center>

<?php require 'menu.php'; 

if(!isset($_SESSION['login'])){
    header('Location:index.php');
}

?>