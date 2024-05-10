<?php
session_start();
require 'backend/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Catalyst</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<style>
        /* General Styling */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

		#wrapper {
			max-width: 100%;
			overflow-x: hidden;
		}


        /* Header Styling */
        header#header {
            text-align: center;
            padding: 2em 0;
        }

        /* Navigation Styling */
        nav#nav {
            text-align: center;
        }

        nav#nav ul {
            list-style: none;
            padding: 0;
        }

        nav#nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        /* Main Content Styling */
        div#main {
            padding: 2em;
        }

        /* Table Styling */
        .table-wrapper {
            overflow-x: auto;
        }

        table.alt {
            width: 100%;
            border-collapse: collapse;
        }

        table.alt th, table.alt td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        /* Footer Styling */
        footer#footer {
            text-align: center;
            padding: 1em 0;
        }

        /* Media Queries for Responsiveness */
        @media screen and (max-width: 768px) {
            /* Header */
            header#header h1 {
                font-size: 24px;
            }

            header#header p {
                font-size: 14px;
            }

            /* Navigation */
            nav#nav ul li {
                display: block;
                margin: 10px 0;
            }

            /* Main Content */
            div#main {
                padding: 1em;
            }
        }
    </style>

</head>


    <body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
                        <h1>Career Catalyst<br> Job Portal</h1>
						<p>Career Catalyst hadir untuk menjawab kebutuhan pencarian karier <br> Mulai petualangan karier kamu sekarang!</p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Pendahuluan</a></li>
							<li><a href="#first">Keuntungan</a></li>
							<li><a href="#second">Job Tersedia</a></li>
							<li><a href="#cta">Login</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Selamat Datang!</h2>
										</header>
										<p>Career Catalyst dirancang untuk membantu kamu menavigasi karier impian dengan mantap dan percaya diri.</p>
									</div>
									<img src="img/index.jpg" class="landing" />
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Keuntungan</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon solid major style1 fa-code"></span>
										<h3>Knowledge</h3>
										<p>Pelatihan oleh mentor yang ahli di bidangnya</p>
									</li>
									<li>
										<span class="icon major style3 fa-copy"></span>
										<h3>Experience</h3>
										<p>Menambah jam terbang dan pendalaman materi</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<h3>Character</h3>
										<p>Pembentukan karakter siap kerja dengan gaya industri modern</p>
									</li>
								</ul>
							</section>

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
                                                <td><a href="login.php" class="btn btn-primary">Login to Apply</a></td>
                                            </tr>
                                            
                                            <?php
                                            };

                                            ?>
                                    </tbody>
                                </table>
                            </div>
							</section>

						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>Login atau Register</h2>
								</header>
								<footer class="major">
									<ul class="actions special">
										<li><a href="login.php" class="button primary">Login</a></li>
									</ul>
								</footer>
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