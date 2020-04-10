<!DOCTYPE html>
<html>
<head>
	<title>Pengaduan</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
		<div class="container">
		  <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav ml-auto">
		      <a class="nav-item nav-link active" href="index.php">Home</a>
		      <?php if (isset($_SESSION["masyarakat"])) : ?>
		      	<a class="nav-item nav-link active" href="pengaduan.php">Pengaduan</a>
		      	<a class="nav-item nav-link active" href="tanggapan.php">Tanggapan</a>
		      	<a class="nav-item nav-link active" href="#"><?php echo $_SESSION["masyarakat"]["nama"]; ?></a>
		      	<a class="nav-item nav-link active" href="logout.php">Logout</a>
		      <?php else: ?>
		      	<a class="nav-item nav-link active" href="daftar.php">Daftar</a>
		      	<a class="nav-item nav-link active" href="login.php">Login</a>
		      <?php endif; ?>

		    </div>
		  </div>
		</div>
	</nav>
	<!-- akhir-navbar -->
