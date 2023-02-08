<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
    $data = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) === 1) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['namaPetugas'];
            $_SESSION['level'] = $data['level'];
            echo "<script>
                alert('Anda berhasil login'),
                window.location.href='index.php?url=home';
            </script>";
        }
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
        <p style="color:red;">Username atau password salah</p>
    <?php endif ?>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Masukan username"><br>
        <input type="password" name="password" placeholder="Masukan password"><br>
        <input type="submit" name="login" value="login">
    </form>
    <a href="auth/login2.php">Login Sebagai Siswa</a>
</body>
</html>