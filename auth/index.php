<?php 
session_start();
$conn = mysqli_connect("localhost","root","","pengaduan_masyarakat");

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
    
    // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["petugas"] = $row;

            if($_SESSION["petugas"]["level"] === "admin"){
                            echo "<script>
              alert('Login Berhasil');
              document.location.href= '../admin/index.php';
             </script>";

            }else{
                                            echo "<script>
              alert('Login Berhasil');
              document.location.href= '../pengaduan/index.php';
             </script>";
            }

        }
    }

    $error = true;

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Petugas</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
</head>
<body>
<div class="jumbotron jumbotron-fluid" style="background-image: url('../img/background.svg');">
  <div class="container">
    <div class="row">
    	<div class="col-md-6 text-white mt-5">
    		<h1 class="display-4">Pengaduan Masyarakat</h1>
    		<p class="lead">Dengan adanya website ini masyarakat dapat menyampaikan keluh kesah yang terjadi dilingkup masyarakat.</p>
    	</div>
    	<div class="col-md-6">
    		<div class="card shadow p-3 mb-5 bg-white rounded mt-3">
    			<div class="card-body">
    				<h2 class="text-center">Login Petugas</h2>
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