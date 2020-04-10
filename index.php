
<?php 
session_start();
require_once 'auth/functions.php';
require_once 'templates/header.php'; 
$hitung = mysqli_query($conn,"SELECT * FROM pengaduan");
$pengaduan = mysqli_num_rows($hitung);

?>


<div class="jumbotron jumbotron-fluid" style="background-image: url('img/background.svg');">
  <div class="container">
    <div class="row">
    	<div class="col-md-6 text-white mt-5">
    		<h1 class="display-4">Pengaduan Masyarakat</h1>
    		<p class="lead">Dengan adanya website ini masyarakat dapat menyampaikan keluh kesah yang terjadi dilingkup masyarakat.</p>
    	</div>
    	<div class="col-md-6 mt-5">
    		<h1 class="display-4 text-white">Total Pengaduan: <?php echo $pengaduan ?></h1>
    	</div>
    </div>
  </div>
</div>

<div class="container mt-5 text-center">
	<div class="row">
		<div class="col-md-4">
			<i style="font-size: 50px" class="fa fa-book"></i>
			<h5 class="mt-3">Komplain</h5>
			<p>Mengajukan keluhan apabila tidak puas dengan pelayanan kami</p>
		</div>
		<div class="col-md-4">
			<i style="font-size: 50px" class="fas fa-tachometer-alt"></i>
			<h5 class="mt-3">Cepat dan Tanggap</h5>
			<p>Lebih cepat direspon oleh pihak manajemen</p>
		</div>
		<div class="col-md-4">
			<i style="font-size: 50px" class="far fa-paper-plane"></i>
			<h5 class="mt-3">Pelayanan Terpadu</h5>
			<p>Melayani komplain menggunakan sistem online</p>
		</div>
	</div>
</div>