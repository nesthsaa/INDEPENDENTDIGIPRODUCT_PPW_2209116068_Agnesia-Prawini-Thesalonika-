<?php
session_start();
// Periksa apakah pengguna telah login dan memiliki peran sebagai "applicant"
if(!isset($_SESSION['username']) || $_SESSION['role'] !== 'applicant') {
    // Jika tidak, arahkan kembali ke halaman login
    header('location: login.php');
    exit;
}
require 'backend/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pekerjaan</title>
    
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
                            <div align="right"><a href="logout.php" class="btn btn-danger">Logout</a></div>

                        <header class="major">
						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2><strong>Job Tersedia</strong></h2>
                                </header>
                                <div class="table-wrapper">
								<table class="alt">
                                    <thead>
                                    <tr>
                                        <th>Posisi Tersedia</th>
                                        <th>Periode</th>
                                        <th>Deadline Pendaftaran</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $getdata = mysqli_query($conn,"select * from job where registerend>'$date_now'");
                                            while($data=mysqli_fetch_array($getdata)){
                                            $idjob = $data['id'];
                                            $namajob = $data['jobname'];
                                            $descjob = $data['jobdesc'];
                                            $mulai = date_format(date_create($data['jobstart']),"d M Y");
                                            $selesai = date_format(date_create($data['jobend']),"d M Y");
                                            $periode = $mulai." - ".$selesai;
                                            $deadline = date_format(date_create($data['registerend']),"d M Y");
                                            $jobloc = $data['jobloc'];
                                            $workingtype = $data['workingtype'];
                                            ?>
                                            
                                            <tr>
                                                
                                                <td><?=$namajob;?></td>
                                                <td><?=$periode;?></td>
                                                <td><?=$deadline;?></td>
                                                <td><a href="apply.php?id=<?=$idjob;?>" class="btn btn-primary">Apply</a></td>
                                            </tr>
                                            
                                            <?php
                                            };

                                            ?>
                                    </tbody>
                                </table>
                            </div>
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