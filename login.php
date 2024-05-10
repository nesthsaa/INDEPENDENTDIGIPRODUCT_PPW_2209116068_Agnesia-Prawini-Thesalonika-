<?php
session_start();
require 'backend/koneksi.php';


// Cek apakah pengguna sudah login
if(isset($_SESSION['username'])) {
    // Cek peran pengguna
    if($_SESSION['role'] == 'admin') {
        header('location: admin.php'); // Jika pengguna adalah admin, arahkan ke halaman dashboard admin
        exit;
    } elseif($_SESSION['role'] == 'applicant') {
        header('location: daftarpekerjaan.php'); // Jika pengguna adalah applicant, arahkan ke halaman dashboard applicant
        exit;
    }
}


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $cekuname = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'");
    $cekrow = mysqli_num_rows($cekuname);

    if($cekrow > 0){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        if($role == 'applicant') {
            header("location:daftarpekerjaan.php");
        } else {
            header('location:admin.php');
        }
    } else {
        echo 'Password salah';
        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header" class="alt">
                        <h1>Career Catalyst <br> Job Portal</h1>
                        <p>Career Catalyst hadir untuk menjawab kebutuhan pencarian karier Anda <br> Mulai petualangan karier Anda sekarang!</p>
                    </header>

                <!-- Main -->
                    <div id="main">

                        <!-- First Section -->
                            <section id="first" class="main special">
                                <header class="major">
                                    <h2>Login Page</h2>
                                    <p>Silahkan Masukkan Username dan Password</p>
                                </header>
                                

                            <form method="post">
                            <div class="row gtr-uniform">
                                <div class="col-12">
                                    <div class="select-wrapper">
                                        <select name="role" id="role">
                                            <option value="">- Pilih Role -</option>
                                            <option value="admin">Admin</option>
                                            <option value="applicant">Applicant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-12-xsmall">
                                    Username
                                    <input type="text" name="username" placeholder="Username" />
                                </div>
                                <div class="col-6 col-12-xsmall">
                                    Password
                                    <input type="password" name="password" placeholder="Password" />
                                </div>
                                <div class="col-12">
                                    <ul class="actions">
                                        <li><input type="submit" value="Login" class="primary" name="login" /></li>
                                        <li><a href="index.php" class="button">Kembali</a></li>
                                    </ul>
                                </div>
                            </div>
                            </form>
                           
                            
                            <!-- Tambahkan tautan ke halaman registrasi -->
                            <p>Belum memiliki akun? <a href="registrasi.php">Registrasi disini!</a></p>
                            </section>

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">Career Catalyst</p>
                    </footer>

            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
