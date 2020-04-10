<?php
session_start(); 
require_once 'auth/functions.php';
require_once 'templates/header.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('User baru ditambahkan');
				document.location.href = 'login.php';
		      </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<div class="jumbotron jumbotron-fluid" style="background-image: url('img/background.svg');">
  <div class="container">
    <div class="row">
    	<div class="col-md-6 text-white mt-5">
    		  <h1 class="display-4">Pengaduan Masyarakat</h1>
                <p class="lead">Dengan adanya website ini masyarakat dapat menyampaikan keluh kesah yang terjadi dilingkup masyarakat.</p>
        </div>
    	<div class="col-md-6">
    		<div class="card shadow p-3 mb-5 bg-white rounded mt-3">
    			<div class="card-body">
    				<h2 class="text-center">Daftar Akun</h2>
    			</div>
    			<form action="" autocomplete="off" method="post">
    			<div>
    				<label>NIK</label>
    				<input type="text" name="nik" class="form-control" maxlength="16"> 
    			</div>
    			<div>
    				<label>Nama</label>
    				<input type="text" name="nama" class="form-control">
    			</div>
    			<div>
    				<label>Username</label>
    				<input type="text" name="username" class="form-control">
    			</div>
    			<div>
    				<label>Password</label>
    				<input type="password" name="password" class="form-control">
    			</div>
    			<div>
    				<label>Telp</label>
    				<input type="text" name="telp" class="form-control" maxlength="13">
    			</div>
    			<button type="submit" name="register" class="btn btn-primary btn-block mt-2">Daftar</button>
    			</form>
    		</div>
    	</div>
    </div>
  </div>
</div>