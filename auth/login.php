<?php

if(isset($_SESSION['login'])){
    header('Location:index.php?url=home');
}

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
            $_SESSION['idPetugas'] = $data['idPetugas'];
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Petugas</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                        <?php if(isset($error)): ?>
                                            <p style="color:red;">Username atau password salah</p>
                                        <?php endif ?>
                                    </div>

                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"aria-describedby="emailHelp"
                                                placeholder="Username..." name="username">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"  placeholder="Password..." name="password">
                                        </div>

                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login">
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="auth/login2.php">Login sebagai siswa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>