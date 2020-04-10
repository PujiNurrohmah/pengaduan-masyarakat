<?php 
session_start();
require 'layouts/header.php';
require '../auth/functions.php';
$id = $_GET["id"];
$pengaduan = query("SELECT * FROM pengaduan WHERE id_pengaduan = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah tombol submit berhasil dikirim atau tidak
    if (updatePengaduan($_POST) > 0) {
        echo "<script>
              alert('Data berhasil dikirim');
              document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dikirim');
                document.location.href = 'index.php';
            </script>";
    }

}

?>


<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mb-5">
			<div class="card">
				<div class="card-header bg-primary text-white text-center">
					Laporan Pengaduan
				</div>
				<div class="card-body">
					<form method="post" action="" autocomplete="off">
					<input type="hidden" name="id_pengaduan" value="<?php echo $pengaduan["id_pengaduan"]; ?>">
					<input type="hidden" name="id_petugas" value="<?php echo $_SESSION["petugas"]["id_petugas"]; ?>">
					<input type="hidden" name="nik" value="<?php echo $pengaduan["nik"]; ?>">
					<div class="form-group">
						<label>Isi Laporan</label>
						<textarea class="form-control" disabled><?php echo $pengaduan["isi_laporan"]; ?></textarea>
					</div>
					<div class="form-group">
						<label>Tanggapan</label>
						<textarea class="form-control" name="tanggapan"></textarea>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Kirim Pengaduan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>