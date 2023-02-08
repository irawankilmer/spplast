<?php
session_start();

if(isset($_SESSION['login'])){
    header('Location:index.php?url=home');
}

require '../functions.php';
if (isset($_POST['login'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn' AND nis = '$nis'");
    $data = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) === 1) {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'siswa';
            $_SESSION['idSiswa'] = 'idSiswa';
            echo "<script>
                alert('Anda berhasil login'),
                window.location.href='../index.php?url=home';
            </script>";
        exit();
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($error)): ?>
        <p style="color:red;">Nisn atau nis salah</p>
    <?php endif ?>
    <form action="" method="post">
        <input type="text" name="nisn" placeholder="Masukan nisn"><br>
        <input type="password" name="nis" placeholder="Masukan nis"><br>
        <input type="submit" name="login" value="login">
    </form>
    <a href="../index.php">Login Sebagai Petugas</a>
</body>
</html>