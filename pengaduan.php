<?php 
session_start(); 
require_once 'auth/functions.php';
require_once 'templates/header.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (kirimPengaduan($_POST) > 0) {
        echo "<script>
              alert('Data berhasil dikirim');
              document.location.href = 'pengaduan.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dikirim');
                document.location.href = 'pengaduan.php';
            </script>";
    }

}



?>

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/background.svg');">
  <div class="container">
    <div class="row">
    	<div class="col-md-8 text-white mt-5">
    		<h1 class="display-4">Pengaduan Masyarakat</h1>
    		<p class="lead">Dengan adanya website ini masyarakat dapat menyampaikan keluh kesah yang terjadi dilingkup masyarakat.</p>
    	</div>
    </div>
  </div>
</div>

<div class="container mb-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header bg-primary text-white text-center">
					Kirim Pengaduan
				</div>
				<div class="card-body">
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="nik" value="<?php echo $_SESSION["masyarakat"]["nik"] ?>">
						<div class="form-group">
							<label>Isi Laporan</label>
							<textarea class="form-control" name="isi_laporan"></textarea>
						</div>
						<div class="form-group">
							<label>Bukti Laporan</label>
							<input type="file" class="form-control" name="gambar">
						</div>
						<button type="submit" name="submit" class="btn btn-primary btn-block">Kirim Pengaduan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>