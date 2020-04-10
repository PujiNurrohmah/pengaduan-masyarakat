<?php 
session_start();
require_once 'auth/functions.php';
require_once 'templates/header.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
    
    // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["masyarakat"] = $row;

            echo "<script>
              alert('Login Berhasil');
              document.location.href= 'index.php';
             </script>";
        }
    }

    $error = true;

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
    				<h2 class="text-center">Login</h2>
    			</div>
    			<form action="" autocomplete="off" method="post">
    			<div>
    				<label>Username</label>
    				<input type="text" name="username" class="form-control">
    			</div>
    			<div>
    				<label>Password</label>
    				<input type="password" name="password" class="form-control">
    			</div>
    			<button type="submit" name="login" class="btn btn-primary btn-block mt-2">Login</button>
    			</form>
    		</div>
    	</div>
    </div>
  </div>
</div>