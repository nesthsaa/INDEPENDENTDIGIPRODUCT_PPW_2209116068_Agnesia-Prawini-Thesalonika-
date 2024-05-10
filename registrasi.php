<?php
session_start();
require 'backend/koneksi.php';

// Deklarasi variabel untuk menyimpan pesan kesalahan
$errors = [];

// Proses registrasi
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    // Atur peran sebagai "applicant"
    $role = 'applicant';

    // Validasi minimal panjang username dan password
    if(strlen($username) < 5 || strlen($password) < 5) {
        $errors[] = 'Username dan password harus memiliki setidaknya 5 karakter.';
    }

    // Validasi username tidak diawali dengan simbol
    if(preg_match('/^[^a-zA-Z]/', $username)) {
        $errors[] = 'Username tidak boleh diawali dengan simbol.';
    }

    // Validasi jika password dan konfirmasi password sama
    if($password !== $password_repeat) {
        $errors[] = 'Password dan konfirmasi password tidak cocok.';
    }

    // Jika tidak ada pesan kesalahan, lanjutkan dengan proses registrasi
    if(empty($errors)) {
        // Lakukan proses insert ke database
        $insert_query = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";
        $insert_result = mysqli_query($conn, $insert_query);

        if($insert_result) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location: login.php'); // Arahkan ke halaman login setelah registrasi berhasil
            exit;
        } else {
            $errors[] = 'Registrasi gagal. Silakan coba lagi.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>


    <style>
        .small-container {
            max-width: 600px; /* Sesuaikan lebar sesuai kebutuhan */
            margin: 50px auto 0; 
        }
    </style>
</head>

<body class="is-preload">
    <!-- Kontainer utama -->
    <div id="main" class="small-container">
        <section id="register" class="main special">
            <h2>Registrasi</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>

                <label for="password_repeat">Ulangi Password:</label>
                <input type="password" id="password_repeat" name="password_repeat" required><br><br>

                <!-- Tempatkan pesan kesalahan di sini -->
                <?php if(!empty($errors)): ?>
                    <div style="color: red;">
                        <?php foreach($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <input type="submit" value="Register" name="register">
            </form>
        </section>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <p class="copyright">Career Catalyst</p>
    </footer>
</body>
</html>