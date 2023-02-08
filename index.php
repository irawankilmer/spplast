<?php 

$conn = mysqli_connect('localhost', 'root', '', 'coba');
$password = password_hash('admin');
mysqli_query($conn, "INSERT INTO petugas VALUES('', 'admin', '$password', 'level')");

 ?>