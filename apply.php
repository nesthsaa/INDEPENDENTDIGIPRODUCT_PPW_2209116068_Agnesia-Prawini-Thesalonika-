<?php
session_start();

require 'backend/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d", strtotime("-16 years"));
$getid = $_GET['id'];
$getdata = mysqli_query($conn,"select * from job where id='$getid'");
$data = mysqli_fetch_array($getdata);

                    $idjob = $data['id'];
                    $namajob = $data['jobname'];
                    $descjob = $data['jobdesc'];
                    $mulai = date_format(date_create($data['jobstart']),"d M Y");
                    $selesai = date_format(date_create($data['jobend']),"d M Y");
                    $periode = $mulai." - ".$selesai;
                    $deadline = date_format(date_create($data['registerend']),"d M Y");
                    $jobloc = $data['jobloc'];
                    $workingtype = $data['workingtype'];

                    if(isset($_POST['apply'])){

                        $a = $_POST['fullname'];
                        $b = $_POST['gender'];
                        $d = $_POST['dob'];
                        $e = $_POST['alamat'];
                        $f = $_POST['email'];
                        $g = $_POST['telepon'];
                        $h = $_POST['motivasi'];
                        $i = $_POST['linkedin'];
                        $j = $_POST['portfolio'];
                    
                        $insertdata = mysqli_query($conn,"insert into registrant (idjob,name,gender,dob,alamat,email,telepon,motivational,linkedin,portfolio) values('$idjob','$a','$b','$d','$e','$f','$g','$h','$i','$j')");
                    
                        if($insertdata){
                            header('location:thanks.php');
                        } else {
                            echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
                        }
                    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$namajob;?></title>
    
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

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?=$namajob;?></h2>
										</header>
                                        <p>(<?=$periode;?>), <?=$workingtype;?></p>
                                        <p>Location: <?=$jobloc;?></p>
                                        <p><?=$descjob;?></p>
									</div>
									<img src="img/landing.jpg" class="landing" />
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Daftar Posisi Ini</h2>
								</header>
								

                            <form method="post">
                            <div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
                                                    Nama
													<input type="text" name="fullname" placeholder="Name" />
												</div>
												<div class="col-6 col-12-xsmall">
                                                    Email
													<input type="email" name="email" placeholder="Email" />
                                                </div>
                                                <div class="col-6 col-12-xsmall">
                                                    Tanggal Lahir
													<input type="date" class="form-control" name="dob" min="1970-01-02" max="<?=$date_now;?>" required>
												</div>
												<div class="col-6 col-12-xsmall">
                                                    Jenis Kelamin
													<select name="gender"><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select>
                                                </div>
                                                <div class="col-6 col-12-xsmall">
                                                    Alamat
													<input type="text" name="alamat" placeholder="Alamat" />
												</div>
												<div class="col-6 col-12-xsmall">
                                                    Telepon (Whatsapp) dimulai dengan 62
													<input type="text" name="telepon" min="1" value="62"required>
                                                </div>
												<div class="col-12">
                                                    Motivasi
													<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
												</div>
                                                <div class="col-6 col-12-xsmall">
                                                    URL LinkedIn
													<input type="url" name="linkedin" required>
												</div>
												<div class="col-6 col-12-xsmall">
                                                    URL Portfolio
													<input type="url" name="portfolio" required>
                                                </div>
                                                <div class="col-12">
													<ul class="actions">
														<li><input type="submit" value="Submit" class="primary" name="apply" /></li>
														<li><a href="daftarpekerjaan.php" class="button">Kembali</a></li>
													</ul>
                                                </div>
                                            </div>
                                    </form>
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