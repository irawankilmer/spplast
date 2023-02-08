<?php 

$conn = mysqli_connect('localhost', 'root', '', 'coba');
$password = password_hash('admin', PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO petugas VALUES('', 'admin', '$password', 'Admin Satu', 'level')");

 ?>