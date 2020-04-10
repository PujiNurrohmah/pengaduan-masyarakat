<?php 
session_start(); 
require_once 'auth/functions.php';
require_once 'templates/header.php';
$nik = $_SESSION["masyarakat"]["nik"];

$tanggapan = query("SELECT * FROM tanggapan WHERE nik = '$nik'");

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

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Tanggapan</th>
						<th>Tanggapan</th>
					</tr>
				</thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach($tanggapan as $t) : ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $t["tgl_tanggapan"]; ?></td>
                        <td><?php echo $t["tanggapan"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
			</table>
		</div>
	</div>
</div>